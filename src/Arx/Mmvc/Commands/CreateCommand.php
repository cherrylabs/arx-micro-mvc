<?php namespace Arx\Mmvc\Commands;

use Arx\classes\File;
use Arx\classes\Utils;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends \Symfony\Component\Console\Command\Command {

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('new')
            ->setDescription('Create a new Arx Micro MVC application.')
            ->addArgument('path', InputArgument::OPTIONAL);
    }
    /**
     * Execute the command.
     *
     * @param  InputInterface  $input
     * @param  OutputInterface  $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->verifyApplicationDoesntExist(
            $directory = getcwd().'/'.$input->getArgument('path'),
            $output
        );

        $output->writeln('<info>Building your Arx application...</info>');

        # Copy stub to path

        $file = new File();

        $file->copyDirectory(__DIR__.'/../../../stubs', $directory);

        $level = count(explode('/', str_replace(getcwd(), '', $directory)));

        $output->writeln('<info>'.str_replace(getcwd(), '', $directory).'</info>');

        $index = file_get_contents($directory . '/' . 'index.php');
        $bootstrap = file_get_contents($directory . '/' . 'bootstrap.php');

        $relPath = "";

        for($i=1;$i<$level;$i++){
            $relPath .= "../";
        }

        $index = Utils::smrtr($index, array('vendor_path' => $relPath.'vendor'));
        $bootstrap = Utils::smrtr($bootstrap, array('vendor_path' => $relPath.'vendor'));

        file_put_contents($directory . '/' . 'index.php', $index);
        file_put_contents($directory . '/' . 'bootstrap.php', $bootstrap);

        $output->writeln('<comment>Application ready! Ready to build something amazing.</comment>');
    }

    /**
     * Verify that the application does not already exist.
     *
     * @param  string  $directory
     * @return void
     */
    protected function verifyApplicationDoesntExist($directory, OutputInterface $output)
    {
        if (is_dir($directory))
        {
            $output->writeln('<error>Application already exists!</error>');
            exit(1);
        }
    }

    /**
     * Clean-up the Zip file.
     *
     * @param  string  $zipFile
     * @return $this
     */
    protected function cleanUp($zipFile)
    {
        @chmod($zipFile, 0777);
        @unlink($zipFile);
        return $this;
    }
}
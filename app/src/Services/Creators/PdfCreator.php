<?php

namespace App\Services\Creators;

use Dompdf\Dompdf;
use Twig\Environment;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class PdfCreator
{
    /**
     * twig
     *
     * @var Environment
     */
    private $_twig;

    /**
     * projectDir
     *
     * @var string
     */
    private $_projectDir;

    public function __construct(Environment $twig, string $projectDir)
    {
        $this->_twig = $twig;
        $this->_projectDir = $projectDir;
    }

    /**
     * createPdf
     *
     * @param  array $params
     * @return string
     */
    public function createPdf(array $params, string $fileName): string
    {
        $pdfHtml = $this->_twig->render(
            'pdf/' . $fileName . '.html.twig',
            [
                'data' => $params
            ]
        );
        $domPdf = new Dompdf();
        $options = $domPdf->getOptions(); 
        $options->set(array('isRemoteEnabled' => true));
        $domPdf->setOptions($options);
        $domPdf->loadHtml($pdfHtml);
        $domPdf->render();
        $output = $domPdf->output();
        $filesystem = new Filesystem();

        try {
            $filesystem->dumpFile(Path::normalize($this->_projectDir . '/files/pdf/' . $fileName . '.pdf'), $output);
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at ".$exception->getPath();
        }

        return Path::normalize($this->_projectDir . '/files/pdf/' . $fileName . '.pdf');
    }
}
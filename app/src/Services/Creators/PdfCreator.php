<?php

namespace App\Services\Creators;

use Twig\Environment;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Knp\Snappy\Pdf;

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
        $pdfGenerator = new Pdf($_ENV['WKHTMLTOPDF_PATH']);

        $pdfHtml = $this->_twig->render(
            'pdf/' . $fileName . '.html.twig',
            [
                'data' => $params
            ]
        );
        $pdfGenerator->setOptions([
            'margin-left' => '0',
            'margin-right' => '0',
            'margin-top' => '0',
            'margin-bottom' => '0',
            'encoding' => 'UTF-8',
            'orientation' => 'portrait',
            'page-size' => 'A4',
            'print-media-type' => true
        ]);

        $pdfContent = $pdfGenerator->getOutputFromHtml($pdfHtml);
        $filesystem = new Filesystem();

        try {
            $filesystem->dumpFile(Path::normalize($this->_projectDir . '/files/pdf/' . $fileName . '.pdf'), $pdfContent);
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at ".$exception->getPath();
        }

        return Path::normalize($this->_projectDir . '/files/pdf/' . $fileName . '.pdf');
    }
}
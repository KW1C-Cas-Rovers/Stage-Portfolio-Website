<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MainSiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Shows the Home landing page of the website
     * @return View
     */
    public function index(): view
    {
        return view('index');
    }

    /**
     * Shows the experience's page of the website
     * @return View
     */
    public function experiences(): view
    {
        return view('experiences');
    }

    /**
     * Shows the project's page of the website
     * @return View
     */
    public function projects(): view
    {
        return view('projects');
    }

    /**
     * Download a PDF file.
     *
     * @param string $fileName The name of the PDF file to download.
     * @return BinaryFileResponse The response containing the downloaded file.
     * @throws HttpException If the file does not exist.
     */
    public function getPdfDownload(string $fileName): BinaryFileResponse
    {
        $filePath = public_path() . "/assets/media/downloads/$fileName";

        if (!File::exists($filePath)) {
            abort(404);
        }

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($filePath, "$fileName", $headers);
    }
}

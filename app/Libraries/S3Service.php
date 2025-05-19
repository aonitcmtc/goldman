<?php

namespace App\Libraries;

use Aws\S3\S3Client;
use Config\AwsS3;

class S3Service
{
    protected $s3;
    protected $bucket;

    public function __construct()
    {
        $config = new AwsS3();

        $this->bucket = $config->bucket;

        $this->s3 = new S3Client([
            'region' => $config->region,
            'version' => 'latest',
            'endpoint' => $config->endpoint,
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key'    => $config->key,
                'secret' => $config->secret,
            ],
        ]);
    }

    public function upload($filePath, $s3Path, $contentType = 'application/octet-stream')
    {
        try {
            $result = $this->s3->putObject([
                'Bucket'      => $this->bucket,
                'Key'         => $s3Path,
                'SourceFile'  => $filePath,
                'ContentType' => $contentType,
                'ACL'         => 'public-read',
            ]);
            // die("ok");
            return $result['ObjectURL'];
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            // print_r($e->getMessage());
            // die("error");
            return false;
        }
    }

    public function show($imagename)
    {
        try {
            $cmd = $this->s3->getCommand('GetObject', [
                'Bucket' => 'space',
                'Key'    => $imagename,
            ]);
            $request = $this->s3->createPresignedRequest($cmd, '+10 minutes');

            // echo "<pre>";
            // print_r($req); 
            // echo "</pre>";
            // die();

            $url = (string) $request->getUri();

            // die("ok");
            return $url;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            // print_r($e->getMessage());
            // die("error");
            return false;
        }
    }

    public function delete($s3Path)
    {
        try {
            $this->s3->deleteObject([
                'Bucket' => $this->bucket,
                'Key'    => $s3Path,
            ]);
            return true;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
}

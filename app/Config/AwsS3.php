<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AwsS3 extends BaseConfig
{
    public $endpoint = 'https://space.myexpress-api.click';
    public $key = '8AvYFSgaVBlVbUebWzWY';
    public $secret = 'oXzAjN3zq8hYSVIISQ1NYzhflEg3ZCfuJstqr47Y';
    public $region = 'ap-southeast-1';
    public $bucket = 'space';
}


// AWS_ENDPOINT=https://space.myexpress-api.click
// AWS_ACCESS_KEY_ID=8AvYFSgaVBlVbUebWzWY
// AWS_SECRET_ACCESS_KEY=oXzAjN3zq8hYSVIISQ1NYzhflEg3ZCfuJstqr47Y
// AWS_BUCKET=space
// AWS_USE_PATH_STYLE_ENDPOINT=true

// .env
// aws.key = YOUR_AWS_ACCESS_KEY_ID
// aws.secret = YOUR_AWS_SECRET_ACCESS_KEY
// aws.region = ap-southeast-1
// aws.bucket = your-s3-bucket-name

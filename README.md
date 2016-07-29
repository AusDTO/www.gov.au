# www.gov.au

The placeholder site for [www.gov.au](http://www.gov.au/)

[![Circle CI](https://circleci.com/gh/AusDTO/www.gov.au.svg?style=svg&circle-token=e2ad7c1b0e6a0825c4c805e4412d064c98cd23cc)](https://circleci.com/gh/AusDTO/www.gov.au)

## Dependencies

None.

## Developing

To get started:

``` bash
git clone https://github.com/AusDTO/www.gov.au.git
cd www.gov.au
python -m SimpleHTTPServer
```

Then view the [site locally](http://localhost:8000).

It's just static HTML, so edit and refresh to your heart's content.

## Deploying

Changes to master will trigger a build on CircleCI, which will push changes to
the S3 bucket.

The site is available from an S3 bucket: http://www-gov-au.s3-website-ap-southeast-2.amazonaws.com

SSL termination and proxying for www.gov.au is handled via httpredir.


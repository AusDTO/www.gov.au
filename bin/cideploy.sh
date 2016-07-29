#!/usr/bin/env bash

# Exit immediately if there is an error
set -e

# cause a pipeline (for example, curl -s http://sipb.mit.edu/ | grep foo) to produce a failure return code if any command errors not just the last command of the pipeline.
set -o pipefail

# echo out each line of the shell as it executes
# so it appears in the jenkins console
set -x

# Allow for extended file globbing
shopt -s extglob

verify_arguments() {
  set +x
  test -n "$S3BUCKET" || (echo "S3BUCKET must be set" && exit 1)
  test -n "$AWS_ACCESS_KEY_ID" || (echo "AWS_ACCESS_KEY_ID must be set" && exit 1)
  test -n "$AWS_SECRET_ACCESS_KEY" || (echo "AWS_SECRET_ACCESS_KEY must be set" && exit 1)
  set -x
}

setup_awscli() {
  pip install awscli
}

update_s3() {
  aws s3 sync --exclude .git . s3://${S3BUCKET} --delete --acl public-read --cache-control "public, max-age=604800"
}

main() {
  verify_arguments
  setup_awscli
  update_s3
}

main $@

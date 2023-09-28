<?php

// $client = new Bitbucket\Client();

// $client->authenticate(Bitbucket\Client::AUTH_OAUTH_TOKEN, Environment::getEnv('BITBUCKET_API_KEY'));

// $list = $client->repositories()
//   ->workspaces(Environment::getEnv('BITBUCKET_WORKSPACE'))
//   ->pipelines(Environment::getEnv('BITBUCKET_REPOSITORY'))
//   ->list([
//       'fields' => 'values.state',
//       'page' => 1,
//       'pagelen' => 1, // limit
//       'sort' => '-created_on',
//       'target.ref_type' => 'BRANCH',
//       'target.ref_name' => Environment::getEnv('BITBUCKET_BRANCH'),
//   ]);

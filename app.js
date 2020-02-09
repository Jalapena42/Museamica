'use strict';

let express = require('express');
let request = require('request');
let querystring = require('querystring');

let client_id = 'c046216ce5944f3f92a4d23c48ba3f0f'; // Your client id
let client_secret = '64b633bc32824b7e80af00c5b9a9ccb2'; // Your secret
let redirect_uri = 'http://localhost:8888/callback'; // Your redirect uri

let app = express();

app.use(express.static(__dirname + '/public'));

// Begin authentication
app.get('/login', function(req, res) {

  let scope = 'user-read-private user-read-email user-read-currently-playing user-library-read user-top-read';
  res.redirect('https://accounts.spotify.com/authorize?' +
    querystring.stringify({
      response_type: 'code',
      client_id: client_id,
      scope: scope,
      redirect_uri: redirect_uri,
      state: state
    }));
});

app.get('/callback', function(req, res) {
  let code = req.query.code || null;
  let authOptions = {
    url: 'https://accounts.spotify.com/api/token',
    form: {
      code: code,
      redirect_uri: redirect_uri,
      grant_type: 'authorization_code'
    },
    headers: {
      'Authorization': 'Basic ' + (new Buffer(client_id + ':' + client_secret).toString('base64'))
    },
    json: true
  };
});

app.get('/refresh_token', function(req, res) {

  // requesting access token from refresh token
  var refresh_token = req.query.refresh_token;
  var authOptions = {
    url: 'https://accounts.spotify.com/api/token',
    headers: { 'Authorization': 'Basic ' + (new Buffer(client_id + ':' + client_secret).toString('base64')) },
    form: {
      grant_type: 'refresh_token',
      refresh_token: refresh_token
    },
    json: true
  };

  request.post(authOptions, function(error, response, body) {
    if (!error && response.statusCode === 200) {
      let access_token = body.access_token;
      res.send({
        'access_token': access_token
      });
    }
  });
});

function signUp(access_token){

  let topArtists = {
    url: 'https://api.spotify.com/v1/me/top/artists',
    headers: { 'Authorization': 'Bearer ' + access_token },
    json: true
  };

  let topTracks = {
    url: 'https://api.spotify.com/v1/me/top/tracks',
    headers: { 'Authorization': 'Bearer ' + access_token },
    json: true
  };

  let playlists = {
    url: 'https://api.spotify.com/v1/me/playlist',
    headers: { 'Authorization': 'Bearer ' + access_token },
    json: true
  };

  let pre_topArtists_json = request.get(topArtists, function(error, response, body) {
    console.log(body);
    return JSON.stringify(body);
  });

  //console.log(JSON.parse(pre_topArtists_json).items[])

  let pre_topTracks_json = request.get(topTracks, function(error, response, body) {
    console.log(body);
    return JSON.stringify(body);
  });

  let post_topTracks_json = JSON.parse(pre_topTracks_json).slice(0,5);

  let pre_playlists_json = request.get(playlists, function(error, response, body) {
    console.log(body);
    return JSON.stringify(body);
  });

};



console.log('Listening on 8888');
app.listen(8888);

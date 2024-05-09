const express = require('express');
const app = express()
const axios = require('axios');

app.use(express.json())

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');  
    res.setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content, Accept, Content-Type, Authorization');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    next();
});

app.post('/register', (req, res) => {
    const body = req.body;
    const name = body.name;
    const email = body.email;
    console.log('identifiants envoyés au server',name, email);
    const requestOptions = {
        headers: {
            'Authorization': 'SuperSecretToken1234'
        }
    };
    axios.post('http://test-technique.pexa4457.odns.fr/register', {name, email}, requestOptions)
    .then(response => {
        console.log(response.data);
        res.status(200).send(response.data);
    })
    .catch(error => res.status(500).send(error));
});

module.exports = app
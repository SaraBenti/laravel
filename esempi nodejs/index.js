const express = require('express');
const app = express();

app.use(express.static('public'));

app.get('/',(req,res)=>{
    res.sendFile(__dirname + 'index.html');
    //altro modo
   // res.sendFile( 'index.html',{root:__dirname});

})

app.put('/',(req,res)=>{
    res.send('Hai richiesto con metodo put');
})


app.listen(3000)
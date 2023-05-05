const http=require('http');

const server=http.createServer(function(req,res){//parametro è una funzione anonima che ne stabilisce il funzionamento
if(req.url=='/'){
    res.end('benvenuto nella mia home page ')
    //facendo delle modifiche finchè non interrompo l'applicativo le modifiche non saranno visibili
}
});
server.listen(3000); //vecchio metodo per creare un server
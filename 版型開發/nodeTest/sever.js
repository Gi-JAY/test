const http = require('http');

const hostname = 'localhost';
const port = 3000;

const sever = http.createServer((req,res)=>{
    res.writeHead(200,{'Content-Type':'text/html'})
    switch(req.url){
        case '/':
            res.end('helo world.');
            break;
        case '/about':
            res.end('This is about page');
            break;
        case 'contack':
            res.end('This is contack page.');
    }
});

sever.listen(port,hostname,()=>{
    console.log(`Sever running at http://${hostname}:${port}`);
})
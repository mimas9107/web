// import the http module
// const http = require("http");
const https=require("https");
const fs=require("fs");
const urlparser=require("url");

const options={
    key: fs.readFileSync("server.key"),
    cert: fs.readFileSync("server.crt")
};

const server = https.createServer(options, (req, res)=>{
    //set reponse type: HTML
    // res.setHeader("Content-Type", "text/html");
    res.writeHead(200, {"Content-Type": "text/html; charset=utf-8"});
    // get the URL and method
    const method = req.method;
    const url = req.url;
    if(url==="/"){
        if(method==="GET"){
            res.statusCode=200;

            // 讀檔
            
            fs.readFile("form.html", "utf8", (err,data)=>{
                if(err){
                    console.log.error("Error reading file: ", err);
                    message="Error reading file";
                    res.end(message);
                }else{
                    
                    console.log("File content: ", data);
                    res.end(data);
                }
            });

            
        }else if(method==="POST"){
            // read POST request data
            let body="";
            req.on("data", (chunk)=>{body+=chunk;});
            req.on("end", ()=>{res.statusCode=200; res.end(`<h1>Received POST data: ${body}</h1>`)});
        }
    }else{
        // res.end("<h1>not yet, 急屁急! api還沒好啦! 滾!</h1>");
        
            
            
            
            
            
        
    }
});

// listen on the port 3000
server.listen(3000, ()=>{console.log("Server is running at http://localhost:3000/")});
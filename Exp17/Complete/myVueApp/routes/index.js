var express = require("express");
//
const fs = require("fs");
//
var router = express.Router();

/* GET home page. */
router.get("/", function (req, res, next) {
    //
    fs.readFile("public/form.html", "utf8", (err, data) => {
        if (err) {
            return res.status(500).send("Error reading form.html");
        }
        res.status(200).send(data); // 回傳表單 HTML
    });
    //res.render('index', { title: 'Express' });
});

module.exports = router;

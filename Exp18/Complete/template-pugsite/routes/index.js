var express = require("express");
var router = express.Router();

/* GET home page. */
router.get("/", function (req, res, next) {
    // Session
    if (!req.session.userId) {
        return res.redirect("/nologin");
    }
    //
    res.render("index", { title: "Express" });
});

router.get("/login", function (req, res, next) {
    //
    res.render("login");
});

router.get("/nologin", function (req, res, next) {
    //
    res.render("nologin");
});

router.get("/register", function (req, res, next) {
    //
    res.render("register");
});

module.exports = router;

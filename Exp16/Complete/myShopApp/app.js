var express = require("express");
const session = require("express-session");
var fs = require("fs");
var path = require("path");
var cookieParser = require("cookie-parser");
var logger = require("morgan");

//var indexRouter = require('./routes/index');
//var usersRouter = require('./routes/users');
//
var authRouter = require("./routes/auth");
//
var productsRouter = require("./routes/products");
var cartRouter = require("./routes/cart");
var checkoutRouter = require("./routes/checkout");

var app = express();

// 設定 Session
app.use(
    session({
        secret: "mysecretkey",
        resave: false,
        saveUninitialized: true,
        cookie: { secure: false },
    })
);

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, "public")));

// 確保 `index.html` 受到 Session 保護
app.get("/", (req, res, next) => {
    if (!req.session.userId) {
        return res.redirect("/nologin");
    }
    next();
});

//app.use('/', indexRouter);
//app.use('/users', usersRouter);
// 設定 `/auth` API
app.use("/auth", authRouter);
//
app.use("/products", productsRouter);
app.use("/cart", cartRouter);
app.use("/checkout", checkoutRouter);

// 讓前端可透過 `/config` 讀取 `config.json`
app.get("/config", (req, res) => {
    const config = JSON.parse(fs.readFileSync("config.json", "utf8"));
    res.json(config);
});

// 讓 Vue Router 處理前端路由
app.get("*", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

module.exports = app;

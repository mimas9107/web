var createError = require("http-errors");
var express = require("express");
var path = require("path");
var cookieParser = require("cookie-parser");
var logger = require("morgan");
// 為了讀取`config.json`
const fs = require("fs");
//
const session = require("express-session");

var indexRouter = require("./routes/index");
var usersRouter = require("./routes/users");
//
const authRouter = require("./routes/auth");

var app = express();

// view engine setup
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "pug");

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, "public")));

// 設定 Session
app.use(
    session({
        secret: "mysecretkey",
        resave: false,
        saveUninitialized: true,
        cookie: { secure: false }, // 若使用 HTTPS，請設為 true
    })
);

// 讀取 `config.json`
const config = JSON.parse(fs.readFileSync("config.json", "utf8"));
// 使用 Middleware，讓 Pug 可取得 `config.json`
app.use((req, res, next) => {
    res.locals.config = config;
    next();
});

app.use("/", indexRouter);
app.use("/users", usersRouter);
//
app.use("/auth", authRouter);

// catch 404 and forward to error handler
app.use(function (req, res, next) {
    next(createError(404));
});

// error handler
app.use(function (err, req, res, next) {
    // set locals, only providing error in development
    res.locals.message = err.message;
    res.locals.error = req.app.get("env") === "development" ? err : {};

    // render the error page
    res.status(err.status || 500);
    res.render("error");
});

module.exports = app;

const express = require("express");
const router = express.Router();
const crypto = require("crypto");

const requireLogin = (req, res, next) => {
    if (!req.session.userId) {
        return res.status(403).json({ message: "Please log in first" });
    }
    next();
};

const merchantID = "MS17361556"; // 測試 MerchantID
const hashKey = "MCmYlwSGnG1bvT4x7cKPqJSWXuQFjgXd";
const hashIV = "C5b72pgzdVZofYGP";

router.post("/", requireLogin, (req, res) => {
    const { total } = req.body;

    // 參考 https://ithelp.ithome.com.tw/articles/10324232
    // Code Source: https://github.com/Wcc723/node-ironman-sample-2023/tree/feature/newebpay-sample

    const orderId = `order${Date.now()}`;
    const timestamp = Math.floor(Date.now() / 1000);

    // 設置藍新支付請求參數
    const tradeInfo = {
        MerchantID: merchantID,
        RespondType: "JSON",
        TimeStamp: timestamp,
        Version: 2.0,
        Amt: total,
        MerchantOrderNo: orderId,
        ItemDesc: "Your Order",
        ReturnURL: "http://localhost:3000/checkout/response", // 這個網址外面連不到
        NotifyURL: "http://localhost:3000/checkout/notify", // 這個網址外面連不到
        LoginType: 0,
    };
    console.log("params");

    // 將交易資料轉換為查詢字串
    const tradeInfoStr = new URLSearchParams(tradeInfo).toString();

    // 加密交易資料
    const encrypt = (data) => {
        const cipher = crypto.createCipheriv("aes256", hashKey, hashIV);
        const encrypted =
            cipher.update(data, "utf8", "hex") + cipher.final("hex");
        return encrypted;
    };

    // 生成檢查碼
    const sha256 = (data) => {
        return crypto
            .createHash("sha256")
            .update(data)
            .digest("hex")
            .toUpperCase();
    };

    const encryptedTradeInfo = encrypt(tradeInfoStr);
    const tradeSha = `HashKey=${hashKey}&${encryptedTradeInfo}&HashIV=${hashIV}`;
    const checkValue = sha256(tradeSha);

    // 回傳支付表單所需資料
    res.json({
        MerchantID: merchantID,
        TradeInfo: encryptedTradeInfo,
        TradeSha: checkValue,
        TimeStamp: timestamp,
        Version: 2.0,
        ReturnUrl: "http://localhost:3000/checkout/response", // 這個網址外面連不到
        NotifyUrl: "http://localhost:3000/checkout/notify", // 這個網址外面連不到
        MerchantOrderNo: orderId,
        Amt: total,
        ItemDesc: "Your Order",
        PayGateWay: "https://ccore.newebpay.com/MPG/mpg_gateway",
    });
});

// 支付回傳（由 NewebPay 重導至此頁面）
router.get("/response", (req, res) => {
    const { Status, Message } = req.query;
    if (Status === "1") {
        res.send("Payment successful");
    } else {
        res.send("Payment failed");
    }
});

// 支付通知（NewebPay POST 通知此 API）
router.post("/notify", (req, res) => {
    console.log("Payment notification received:", req.body);
    res.status(200).send("OK");
});

module.exports = router;

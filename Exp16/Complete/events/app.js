// 引入 events 模組
const EventEmitter = require("events");

// 創建一個新的事件發射器實例
const eventEmitter = new EventEmitter();

// 定義事件監聽器
eventEmitter.on("greet", () => {
    console.log("Hello, world!");
});

// 發射事件
eventEmitter.emit("greet");

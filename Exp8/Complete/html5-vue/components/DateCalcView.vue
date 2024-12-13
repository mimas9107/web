<script setup>
import { ref } from 'vue';
// 以ref()產生渲染(Rendering)資料所需的變數
let beginDateValue = ref("");
let endDateValue = ref("");
//
let myYearValue = ref(0);
let myMonthValue = ref(0);
let myDayValue = ref(0);
// 因應相關動作設定的function
function diffFunc() {
    // 請參考之前撰寫內容修改
    let bgDate = new Date(beginDateValue.value);
    let edDate = new Date(endDateValue.value);

    let totalDays = (edDate - bgDate) / 1000 / 60 / 60 / 24;

    myYearValue.value = parseInt(totalDays / 365);
    myMonthValue.value = parseInt((totalDays - myYearValue.value * 365) / 30);
    myDayValue.value = (totalDays - myYearValue.value * 365) % 30;
}

function calcFunc() {
    // 請參考之前撰寫內容修改
    let edDate = new Date(beginDateValue.value);

    let addDays = parseInt(myYearValue.value) * 365 +
        parseInt(myMonthValue.value) * 30 +
        parseInt(myDayValue.value);
    edDate.setDate(edDate.getDate() + addDays);

    endDateValue.value = edDate.toLocaleDateString('en-CA');
}
</script>

<template>
    <article>
        <h2>日期計算</h2>
        <form action="" method="">
            <label for="beginDate" class="necessary">開始日期</label>
            <!-- [Vue.JS] 加入 v-model  -->
            <input v-model="beginDateValue" type="date" id="beginDate" name="beginDate" required /> <br />
            <label for="endDate">結束日期</label>
            <!-- [Vue.JS] 加入 v-model  -->
            <input v-model="endDateValue" type="date" id="endDate" name="endDate" /> <br />
            <!-- [Vue.JS] 加入 v-on  -->
            <button @click="diffFunc" type="button" id="diffBtn" name="diffBtn">相差</button>
            <label for="diffBtn">(計算開始日期、結束日期一共相差幾年、幾月、幾日，並顯示於以下欄位)</label> <br />

            <!-- [Vue.JS] 加入 v-model  -->
            <input v-model="myYearValue" type="number" id="myYear" name="myYear" />
            <label for="myYear">年</label> <br />
            <!-- [Vue.JS] 加入 v-model  -->
            <input v-model="myMonthValue" type="number" id="myMonth" name="myMonth" />
            <label for="myMonth">月</label> <br />
            <!-- [Vue.JS] 加入 v-model  -->
            <input v-model="myDayValue" type="number" id="myDay" name="myDay" />
            <label for="myDay">天</label> <br />
            <!-- [Vue.JS] 加入 v-on  -->
            <button @click="calcFunc" type="button" id="calcBtn" name="calcBtn">相加</button>
            <label for="calcBtn">(以開始日期開始，加上年、月、日之數字後，推算出結束日期)</label> <br />
        </form>
    </article>
</template>

<style scoped>
/* Step 3: Form Style & Validation */
form {
    /* box */
    padding: 5px;
    border: 2px solid #FFC90E;
    border-radius: 5px;
}

form input {
    width: 95%;
    /* box */
    margin: 5px;
}

form button {
    width: 95%;
    /* box */
    margin: 5px;
    /* color */
    background-color: green;
    color: white;
}

form .necessary:after {
    content: " *";
    /* color */
    color: red;
}

form input:valid {
    /* color */
    border-color: black;
    /* box */
    border-style: solid;
}

form input:invalid {
    /* color */
    border-color: red;
    /* box */
    border-style: dashed;
    background-color: pink;
}
</style>
<script setup>
import { onMounted } from 'vue';
/*
document.addEventListener("DOMContentLoaded", function () {
*/
onMounted(() => {
    // 請參考之前撰寫內容修改
    const time = new Date();
    const hour = -3600 * (time.getHours() % 12);
    const mins = -60 * time.getMinutes();
    /*
    var app = document.querySelector("#app");
    app.style.setProperty('--_dm', `${mins}s`);
    app.style.setProperty('--_dh', `${(hour + mins)}s`);
    */
    /* 改使用 document.documentElement.style.setProperty(); */
    document.documentElement.style.setProperty('--_dm', `${mins}s`);
    document.documentElement.style.setProperty('--_dh', `${(hour + mins)}s`);
})
</script>

<template>
    <article class="oneColumn">
        <div class="clock">
            <div class="clock-face" id="app">
                <time datetime="12:00">12</time>
                <time datetime="1:00">1</time>
                <time datetime="2:00">2</time>
                <time datetime="3:00">3</time>
                <time datetime="4:00">4</time>
                <time datetime="5:00">5</time>
                <time datetime="6:00">6</time>
                <time datetime="7:00">7</time>
                <time datetime="8:00">8</time>
                <time datetime="9:00">9</time>
                <time datetime="10:00">10</time>
                <time datetime="11:00">11</time>
                <!-- 指針 -->
                <span class="arm seconds"></span>
                <span class="arm minutes"></span>
                <span class="arm hours"></span>
            </div>
        </div>
    </article>
</template>

<style scoped>
/* Animation - Clock */
/* 錶面 */
.clock {
  --_ow: clamp(5rem,30vw,40rem);
  --_w: 88cqi;
  --_sz: 12cqi;
  --_r: calc((var(--_w) - var(--_sz)) / 2);

  background: #222;
  block-size: var(--_ow);
  border-radius: 24%;
  container-type: inline-size;
  display: grid;
  font-family: ui-sans-serif, system-ui, sans-serif;
  inline-size: var(--_ow);
  margin-inline: auto;
  place-content: center;
}

.clock-face {
  aspect-ratio: 1;
  background: var(--_bgc, #FFF);
  border-radius: 50%;
  block-size: var(--_w);
  font-size: 6cqi;
  font-weight: 700;
  list-style-type: none;
  inline-size: var(--_w);
  padding: unset;
  position: relative;
}

.clock-face time {
  --_x: calc(var(--_r) + (var(--_r) * cos(var(--_d))));
  --_y: calc(var(--_r) + (var(--_r) * sin(var(--_d))));
  display: grid;
  height: var(--_sz);
  left: var(--_x);
  place-content: center;
  position: absolute;
  top: var(--_y);
  width: var(--_sz);
}

.clock-face time:nth-child(1) { --_d: 270deg; }
.clock-face time:nth-child(2) { --_d: 300deg; }
.clock-face time:nth-child(3) { --_d: 330deg; }
.clock-face time:nth-child(4) { --_d: 0deg; }
.clock-face time:nth-child(5) { --_d: 30deg; }
.clock-face time:nth-child(6) { --_d: 60deg; }
.clock-face time:nth-child(7) { --_d: 90deg; }
.clock-face time:nth-child(8) { --_d: 120deg; }
.clock-face time:nth-child(9) { --_d: 150deg; }
.clock-face time:nth-child(10) { --_d: 180deg; }
.clock-face time:nth-child(11) { --_d: 210deg; }
.clock-face time:nth-child(12) { --_d: 240deg; }

/* 指針 */
.arm {
  background-color: var(--_abg);
  border-radius: calc(var(--_aw) * 2);
  display: block;
  height: var(--_ah);
  left: calc((var(--_w) - var(--_aw)) / 2);
  position: absolute;
  top: calc((var(--_w) / 2) - var(--_ah));
  transform: rotate(0deg);
  transform-origin: bottom;
  width: var(--_aw);
}

.seconds {
  --_abg: hsl(0, 5%, 40%);
  --_ah: 145px;
  --_aw: 2px;
  animation: turn 60s steps(60, end) infinite;
}

.minutes {
  --_abg: #333;
  --_ah: 145px;
  --_aw: 6px;
  animation: turn 3600s steps(60, end) infinite;
  /* 搭配JS */
  animation-delay: var(--_dm, 0s);
}

.hours {
  --_abg: red;
  --_ah: 110px;
  --_aw: 6px;
  animation: turn 43200s linear infinite;
  /* 搭配JS */
  animation-delay: var(--_dh, 0s);
}

@keyframes turn {
  to {
    transform: rotate(1turn);
  }
}
</style>
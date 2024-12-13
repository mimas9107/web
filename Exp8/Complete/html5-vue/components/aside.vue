<script setup>

</script>

<template>
    <aside>
        <div class="navbar bg-primary navbar-expand-md" data-bs-theme="dark">
            <!-- 多套用"flex-column"可強制轉成vertical menu bar -->
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><RouterLink class="nav-link" to="/">首頁</RouterLink></li>
                <li class="nav-item"><RouterLink class="nav-link" to="/clock">時鐘</RouterLink></li>
                <li class="nav-item"><a class="nav-link" href="photoAlbum.html">相簿</a></li>
                <li class="nav-item"><RouterLink class="nav-link" to="/dateCalc">日期計算</RouterLink></li>
                <li class="nav-item"><a class="nav-link" href="fileForm.html">檔案上傳</a></li>
                <li class="nav-item"><a class="nav-link" href="dbTable.html">資料查詢</a></li>
            </ul>
        </div>
        <!-- 以下是使用自己的CSS來製作vertical menu 
        <ul>
        -->
        <!-- <RouterLink to="/">Go to Home</RouterLink> -->
        <!--
            <li><RouterLink to="/">首頁</RouterLink></li>
            <li><RouterLink to="/clock">時鐘</RouterLink></li>
            <li><a href="photoAlbum.html">相簿</a></li>
            <li><RouterLink to="/dateCalc">日期計算</RouterLink></li>
            <li><a href="fileForm.html">檔案上傳</a></li>
            <li><a href="dbTable.html">資料查詢</a></li>
        </ul>
        -->
    </aside>
</template>

<!-- 這裡示範使用Bootstrap來製作，亦可解開，使用自己的CSS來製作vertical menu
<style scoped>
/* Aside Bar: vertical */
aside ul {
  list-style-type: none;
  /* box */
  margin: 0;
  padding: 0;
  /* color */
  background-color: #f1f1f1;  
}

aside ul li a {
  display: block;
  /* color */
  color: #000;
  /* box */
  padding: 8px 16px;
  /* text */
  text-decoration: none;
}

aside ul li a:hover {
  /* color */
  background-color: #555;
  color: white;
}
</style>
-->
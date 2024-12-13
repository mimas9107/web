<script setup>

</script>

<template>
    <header>
        <nav>
            <ul>
                <!-- <RouterLink to="/">Go to Home</RouterLink> -->
                <li><RouterLink to="/">首頁</RouterLink></li>
                <li><RouterLink to="/clock">時鐘</RouterLink></li>
                <li><a href="photoAlbum.html">相簿</a></li>
                <li><RouterLink to="/dateCalc">日期計算</RouterLink></li>
                <li><a href="fileForm.html">檔案上傳</a></li>
                <li><a href="dbTable.html">資料查詢</a></li>
                <!-- 下面是 dropdown menu -->
                <li class="myDropdown"><a href="javascript:void(0)">Dropdown Menu</a>
                    <div class="dropdown-content">
                        <RouterLink to="/">首頁</RouterLink>
                        <RouterLink to="/clock">時鐘</RouterLink>
                        <a href="photoAlbum.html">相簿</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
/* Navigation Bar: horizontal */
nav ul {
  list-style-type: none;
  overflow: hidden;
  /* color */
  background-color: #333;
  /* box */
  margin: 0;
  padding: 0;
}  

nav ul li {
  float: left;
}

nav ul li a {
  display: block;
  /* color */
  color: white;
  /* box */
  padding: 14px 16px;
  /* text */
  text-decoration: none;
}

nav ul li a:hover {
  /* color */
  background-color: #111;
}

/* Dropdown Menu => 要記得加入新的HTML Elements */
.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  /* color */
  background-color: #f9f9f9;
  /* box */
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
  display: block;
  /* color */
  color: black;
  /* box */
  padding: 12px 16px;
  /* text */
  text-decoration: none;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #d1d1d1;
}

.myDropdown:hover .dropdown-content {
  display: block;
}
</style>
<!-- 使用Grid排版，1. 先增加 "container" class-->
<body class="container">
  <!-- 使用Grid排版，2. 增加 "row" class-->
  <header class="row">
    <!-- <nav>要套用"navbar" class -->
    <nav class="navbar bg-primary navbar-expand-md" data-bs-theme="dark">
      <!-- <ul>要套用"navbar-nav" class  -->
      <ul class="navbar-nav">
        <!-- <li>要套用"nav-item" class -->
        <!-- <a>要套用"nav-link" class -->
        <li class="nav-item"><a class="nav-link" href="index.html">首頁</a></li>
        <li class="nav-item"><a class="nav-link" href="clock.html">時鐘</a></li>
        <li class="nav-item"><a class="nav-link" href="photoAlbum.html">相簿</a></li>
        <li class="nav-item"><a class="nav-link" href="dateCalc.html">日期計算</a></li>
        <li class="nav-item"><a class="nav-link" href="fileForm.html">檔案上傳</a></li>
        <li class="nav-item"><a class="nav-link" href="dbTable.html">資料查詢</a></li>
        <!-- 下面是 dropdown menu -->
        <!-- <li>要再多套用"dropdown" class -->
        <li class="nav-item dropdown">
          <!-- <a>要再多套用"dropdown-toggle" class 以及增加data-bs-toggle屬性(連接至JS) -->
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Dropdown Menu</a>
          <!-- 之前只用<div><a>請改成<ul><li>選單形式 -->
          <!-- <div class="dropdown-content"> -->
          <!-- <ul>要套用"dropdown-menu" class -->
          <ul class="dropdown-menu">
            <!-- <a>要套用"dropdown-item" class -->
            <li><a class="dropdown-item" href="index-flat-ui.html">首頁</a></li>
            <li><a class="dropdown-item" href="clock.html">時鐘</a></li>
            <li><a class="dropdown-item" href="photoAlbum.html">相簿</a></li>
          </ul>
          <!-- </div>-->
        </li>
      </ul>
    </nav>
    <!-- Breadcrumb 頁面路徑-->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
      </ol>
    </nav> 
  </header>

  <!-- 使用Grid排版，2. 增加 "row" class-->
  <div class="row">
    <!-- 使用Grid排版，3. 增加 "column" class-->
    <section class="col-12 col-md-9">
      <!-- 使用Grid排版，1. 先增加 "container-fluid" class-->
      <div class="contailer-fluid">
        <!-- 使用Grid排版，2. 增加 "row" class-->
        <div class="row">
          <!-- 使用Grid排版，3. 增加 "column" class-->
          <article class="col-12 col-lg-6">
            <h2>諾貝爾物理學獎揭曉！2學者共同獲獎</h2>
            <p>[NOWnews今日新聞] 2024年諾貝爾獎季開跑，今年諾貝爾物理學獎於台灣時間10月8日下午5時45分公布，獲獎者為由美國科學家霍普菲爾德（John J.
              Hopfield）、加拿大學者辛頓（Geoffrey E. Hinton），獎項表彰兩人透過人工神經網路（Artificial Neural Network）在機器學習（machine
              learning）領域的基礎發現與發明。</p>
            <p>今年諾貝爾物理學獎由美國科學家霍普菲爾德（John J. Hopfield）、加拿大電腦科學家辛頓（Geoffrey E.
              Hinton）共同獲獎；諾貝爾物理獎迄今已頒發117次，累積共有225名獲獎人，其中得獎女性包含去年的得主僅5名 ，最年輕的得獎者為25歲，最年長的得獎者為96歲。</p>
            <p>
              物理獎得主公布後，化學獎、文學獎、和平獎依序於本周三（9日）至周五（11日）揭曉，自今年10月7日起，諾貝爾獎委員會將依序揭曉生醫、物理、化學、文學、和平等5座獎，其餘獎項將於接下來的幾天揭曉，各獎獎金為1100萬瑞典克朗（約新台幣3414萬元），若得主超過1人則由共享殊榮者分享獎金。
            </p>
          </article>
          <!-- 使用Grid排版，3. 增加 "column" class-->
          <article class="col-12 col-lg-6">
            <h2>諾貝爾生醫獎揭幕！美2生物學家因發現microRNA獲獎</h2>
            <p>2024年諾貝爾獎季開跑，今年諾貝爾生理學或醫學獎（簡稱生醫獎）於台灣時間10月7日下午5時30分揭曉，獲獎者為兩名美國科學家安布羅斯（Victor Ambros）與魯夫昆（Gary
              Ruvkun），兩人因在發現小分子核糖核酸（microRNA，又稱微RNA）及其在轉錄後基因調控中的重要作用的傑出貢獻而獲獎。</p>
            <p>自今年10月7日起，諾貝爾獎委員會將依序揭曉生醫、物理、化學、文學、和平等5座獎，其餘獎項將於接下來的幾天揭曉：</p>
            <ol>
              <li>物理獎：10月8日（周二）17：45</li>
              <li>化學獎：10月9日（周三）17：45</li>
              <li>文學獎：10月10日（周四）19：00</li>
              <li>和平獎：10月11日（周五）17：00</li>
              <li>經濟學獎：10月14日（周一）17：45</li>
            </ol>
          </article>
        </div>
        <!-- 使用Grid排版，2. 增加 "row" class-->
        <div class="row">
          <!-- 使用Grid排版，3. 增加 "column" class-->
          <article class="col-12 col-lg-6">
            <h2>表格顯示</h2>
            <!-- 套用Bootstrap預設的<Table>樣式 -->
            <table class="table table-striped">
              <tr>
                <th>訓練場</th>
                <th>地址</th>
                <th>電話</th>
              </tr>
              <tr>
                <td>泰山訓練場</td>
                <td>24302新北市泰山區貴子里致遠新村55之1號</td>
                <td>02-2901-8274</td>
              </tr>
              <tr>
                <td>五股訓練場</td>
                <td>24890新北市五股區五權路17號7樓</td>
                <td>02-8990-3676</td>
              </tr>
              <tr>
                <td>基隆訓練場</td>
                <td>20247基隆市中正區平一路21之5號</td>
                <td>02-2463-6805</td>
              </tr>
              <tr>
                <td>宜蘭訓練場</td>
                <td>26448宜蘭縣員山鄉員山路3段500巷1號</td>
                <td>03-923-1295</td>
              </tr>
              <tr>
                <td>花蓮訓練場</td>
                <td>97064花蓮市華西路123號(東華大學美勞教育館)</td>
                <td>03-824-2083</td>
              </tr>
            </table>
          </article>
          <!-- 使用Grid排版，3. 增加 "column" class-->
          <article class="col-12 col-lg-6">
            <h2>圖片放置</h2>
            <img width="50%"
              src="https://ws.wda.gov.tw/Download.ashx?u=LzAwMS9VcGxvYWQvMzA4L2NrZmlsZS9iYTlhMGViZS05YjhkLTQ5OGMtYjlhYS1iNjUxYjYzN2ExODIuanBn&n=dGFpbG9nby5KUEc%3D&icon=.JPG" />
          </article>
        </div>
      </div>
    </section>
    <!-- 使用Grid排版，3. 增加 "column" class-->
    <aside class="col-12 col-md-3">
      <div class="navbar bg-dark navbar-expand-md"  data-bs-theme="dark">
        <!-- 多套用"flex-column"可強制轉成vertical menu bar -->
        <ul class="navbar-nav flex-column">
          <li class="nav-item"><a class="nav-link" href="index.html">首頁</a></li>
          <li class="nav-item"><a class="nav-link" href="clock.html">時鐘</a></li>
          <li class="nav-item"><a class="nav-link" href="photoAlbum.html">相簿</a></li>
          <li class="nav-item"><a class="nav-link" href="dateCalc.html">日期計算</a></li>
          <li class="nav-item"><a class="nav-link" href="fileForm.html">檔案上傳</a></li>
          <li class="nav-item"><a class="nav-link" href="dbTable.html">資料查詢</a></li>
        </ul>
      </div>
    </aside>
  </div>
  <!-- 使用Grid排版，2. 增加 "row" class-->
  <footer class="row">
    <!-- 多加一層<div>以設置內部元件的對齊方式-->
    <div class="d-flex align-items-center">
      <img width="5%" src="https://wdaweb.github.io/index_assets/img/wda.png" />
      <!-- 以fs-5設置文字大小為5 (即Bootstrap制定的h5大小) -->
      <h1 class="fs-5"> 網頁課程 COPYRIGHT&#169;2024</h1>
    </div>
  </footer>
</body>

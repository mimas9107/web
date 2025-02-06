<h2>刊登文章</h2>
<p>這裡使用CKEditor讓使用者更方便輸入內容</p>
<p>在<code>&lt;head&gt;</code>中有透過CDN引用CKEditor</p>
<!-- 顯示ajax回報message -->
<div id="msgArea" style="padding:5px;"></div>

<!-- 不要設定 action，改用 XHR 送 -->
<!-- enctype="multipart/form-data" => 支援檔案上傳 -->
<form id="formPost" enctype="multipart/form-data">
    <label for="title">標題：</label><br>
    <input class="form-control" type="text" id="title" name="title" style="width: 300px;" required><br><br>

    <label for="content">內容：</label><br>
    <textarea name="content" id="content" rows="6" cols="60"></textarea><br><br>

    <label for="image">圖片上傳 (PNG/JPG)：</label><br>
    <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg" /><br><br>  

    <button class="btn btn-primary" type="submit">發布</button>
</form>

<script>
    // 轉換 textarea 為 CKEditor 富文本編輯器
    CKEDITOR.replace('content');
</script>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var form = document.getElementById('formPost');
    var msgArea = document.getElementById('msgArea');

    form.addEventListener('submit', function(e){
        e.preventDefault(); // 阻止表單預設行為(跳轉)

        // 取得標題與 CKEditor 內容
        var title   = document.getElementById('title').value;
        var content = CKEDITOR.instances.content.getData();

        // 使用 FormData 收集資料
        var formData = new FormData();
        formData.append('title', title);
        formData.append('content', content);

        // 取檔案
        var fileInput = document.getElementById('image');
        if(fileInput.files.length > 0){
            formData.append('image', fileInput.files[0]);
        }

        // 建立 XHR
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'post-handle.php', true);

        // 接收後端回應
        xhr.onload = function(){
            if(xhr.status === 200){
                try {
                    var resp = JSON.parse(xhr.responseText);
                    if(resp.status === 'ok'){
                        msgArea.style.color = 'green';
                        msgArea.textContent = resp.message;
                        // 清空表單
                        document.getElementById('title').value = '';
                        CKEDITOR.instances.content.setData('');
                        fileInput.value = '';
                    } else {
                        msgArea.style.color = 'red';
                        msgArea.textContent = resp.message;
                    }
                } catch(e){
                    msgArea.style.color = 'red';
                    msgArea.textContent = "回傳資料解析錯誤：" + e;
                }
            } else {
                msgArea.style.color = 'red';
                msgArea.textContent = "發生錯誤，狀態碼：" + xhr.status;
            }
        };

        // 發送 AJAX
        xhr.send(formData);
    });
});
</script>
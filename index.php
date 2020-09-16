<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- jsonファイルからjavascriptの配列に代入する方法 -->
    <!-- phpでjsonファイルを読み込み　→　phpの連想配列をjavascriptの変数に渡す -->
    <!-- 連想配列は echo で渡そうとすると文字列でないのでエラーが起こる　なのでjsで有効なjson文字列に変更する -->
    <?php
      $root = "test.json";
      $file = file_get_contents($root); //指定したファイルの要素を全て取得する
      $json = json_decode($file, true); //json形式のデータを連想配列の形式で代入

      //このままでもphpでは使えるがjsのは渡せない
      foreach ($json as $value) {
        echo $value; echo '<br>'; //確認
      }
    ?>

    <script type="text/javascript">
      (function() {
        //phpから配列を受け取る

        <?php $json_encoded = json_encode($json); //json文字列に変換 ?>

        let json = <?php echo $json_encoded; ?>;
        console.log(json);

      }).call(this);

    </script>
  </body>
</html>

# formatter
各種変換ユーティリティ

## Install

利用するプロジェクトの `composer.json` に以下を追加する。
```composer.json
"repositories": {
    "formatter": {
        "type": "vcs",
        "url": "https://github.com/shimoning/formatter.git"
    }
},
```

その後以下でインストールする。

```bash
composer require shimoning/formatter
```

## Usage

### 時間系
#### number2clock
数値を `n:mm` 形式にする。
数値に `分` を入れれば `h:mm` として、`秒` を入れれば `m:ss` として利用できる。
`:` より前の値は 3桁以上になりうる。

```php
Time::number2clock(100); // -> 1:40
```

第2引数には時間を分けるための文字を設定可能。
デフォルトでは `:` となっている。

```php
Time::number2clock(100, '-'); // -> 1-40
```

#### clock2number
`n:mm` 形式の文字列を数値にする。
`number2clock` の逆。

```php
Time::clock2number('1:40'); // -> 100
```

第2引数には時間を分けるための文字を設定可能。
デフォルトでは `:` となっている。

```php
Time::clock2number('1-40', '-'); // -> 100
```


### 数値
#### removeComma
数字的な文字列からカンマを取り除く。

```php
Number::removeComma('123,456'); // -> 123456
```

第2引数には、カンマ扱いする文字を設定可能。
デフォルトでは `,` となっている。

```php
Number::removeComma('222 333', ' '); // -> 222333
```

#### numberFormat
標準関数 `number_format` のラッパー。

```php
Number::numberFormat(123456); // -> 123,456
```

第2引数には、区切り文字として付与する文字を設定可能。
デフォルトでは `,` となっている。

```php
Number::removeComma(222333, ' '); // -> 222 333
```

第3引数には、削除すべき区切り文字を設定可能。
デフォルトでは `,` となっている。

```php
Number::removeComma('111=222', ' ', '='); // -> 111 222
```


### SQL 関連
#### sanitizeTextForSearchQuery
前方一致や後方一致を安全に行うための文字列サニタイザ。

```php
Sql::sanitizeTextForSearchQuery('%test'); // -> \%test
```


### 文字列系
#### マルチバイト対応trim
マルチバイト対応で、文字列の前後から空白を取り除く。

```php
Text::trim('　a23 あああ '); // -> a23 あああ
```

#### マルチバイト対応で空白で文字列を配列にする(explode)
マルチバイト対応で、文字列を空白文字で区切る。

```php
Text::splitBySpace('　a23　あああ　') // -> ['a23', 'あああ']
```


### Excel 関連
#### 列番号をアルファベットに変換する
変換できない場合は false を返す。

```php
Excel::alphabet(0); // -> false
Excel::alphabet(1); // -> A
Excel::alphabet(27); // -> AA
```

#### 列のアルファベットを列番号に変換する
変換できない場合は false を返す。

```php
Excel::index('エラー'); // -> false
Excel::index('A');; // -> 1
Excel::index('AA'); // -> 27
```


### 範囲
#### n番台の最初の値を取得する
第1引数は、桁の先頭の値。
第2引数は、桁の数。

```php
Range::lowerBound(1, 3); // -> 100
```

#### n番台の最後の値を取得する
第1引数は、桁の先頭の値。
第2引数は、桁の数。

```php
Range::upperBound(1, 3); // -> 199
```


## Test
```bash
composer run test
```

## CLI 実行
```bash
php psysh.php
```

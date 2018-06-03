# KandT project

## Page

```sql
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) NOT NULL,
  `title` varchar(110) NOT NULL,
  `h1` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  `spanClass` varchar(50) NOT NULL,
  `spanText` varchar(100) NOT NULL,
  `img-alt` varchar(100) NOT NULL,
  `img-src` varchar(2048) NOT NULL,
  `nav-title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4_unicode_ci;
```

## Front office

## Back office

### index

```
GET admin/index.php?a=page.index
GET admin/index.php
GET admin/?a=page.index
GET admin/
```

```php
PageController::index()
PageModel::findAll()
PageView::index($data)
```

### show

```
GET admin/index.php?a=page.show&id={id}
GET admin/?a=page.show&id={id}
```

```php
PageController::show()
PageModel::findOne($id)
PageView::show($data)
```


### add

```
GET admin/index.php?a=page.add
GET admin/?a=page.add
```

```php
PageController::add()
PageModel::sqlAdd($data)
PageView::add($model)
```


### edit



### delete

```
GET admin/index.php?a=page.delete&id={id}
GET admin/?a=page.delete&id={id}
```

```php
PageController::delete()
PageModel::sqlDelete($data)
PageView::delete($model)
```
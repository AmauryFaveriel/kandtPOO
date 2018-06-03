<?php
/**
 * Created by PhpStorm.
 * User: mrfvr
 * Date: 30/05/2018
 * Time: 17:19
 */

namespace View;


use Model\PageModel;

class PageView
{
    /**
     * @param array|null $data
     */
    public function index(?array $data): void
    {
?>
        <a href="index.php?a=page.add">Ajouter une page</a>
        <h1>List pages</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        <?php if(is_null($data)):?>
            <tr>
                <td colspan="3">No pages</td>
            </tr>
        <?php else:foreach ($data as $onePage):?>
            <tr>
                <td><a href="index.php?a=page.show&id=<?=$onePage['id']?>"><?=$onePage['id']?></a></td>
                <td><?=$onePage['slug']?></td>
                <td>Action</td>
            </tr>
        <?php endforeach; endif;?>
        </table>
<?php
    }

    /**
     * @param array|null $data
     */
    public function show(?array $data): void
    {
?>
        <a href="index.php">Liste</a>
    <h1><?=$data['title']?></h1>
    <a href="index.php?a=page.edit&id=<?=$data['id']?>">Edit</a>
    <a href="index.php?a=page.delete&id=<?=$data['id']?>">Delete</a>
    <h2>id</h2>
    <p><?=$data['id']?></p>
    <h2>slug</h2>
    <p><?=$data['slug']?></p>
    <h2>h1</h2>
    <p><?=$data['h1']?></p>
    <h2>p</h2>
    <p><?=nl2br($data['p'])?></p>
    <h2>span-class</h2>
    <p><?=$data['spanClass']?></p>
    <h2>span-text</h2>
    <p><?=$data['spanText']?></p>
    <h2>img-alt</h2>
    <p><?=$data['img-alt']?></p>
    <h2>img-src</h2>
    <p><?=$data['img-src']?></p>
    <h2>nav-title</h2>
    <p><?=$data['nav-title']?></p>

<?php
    }

    public function add(PageModel $model)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST['page'];
            $id = $model->sqlAdd($data);
            header('Location:index.php?a=page.show&id='.$id);
            exit;
        }
        ?>
        <form action="" method="post">
            <label>slug</label><br><input type="text" name="page[slug]" value="" /><br>
            <label>title</label><br><input type="text" name="page[title]" value="" /><br>
            <label>h1</label><br><input type="text" name="page[h1]" value="" /><br>
            <label>p</label><br><textarea name="page[p]" id="" cols="30" rows="10"></textarea><br>
            <label>span-class</label><br><input type="text" name="page[span-class]" value="" /><br>
            <label>span-text</label><br><input type="text" name="page[span-text]" value="" /><br>
            <label>img-alt</label><br><input type="text" name="page[img-alt]" value="" /><br>
            <label>img-src</label><br><input type="text" name="page[img-src]" value="" /><br>
            <label>nav-title</label><br><input type="text" name="page[nav-title]" value="" /><br>
            <input type="submit" value="Ajouter">
        </form>
<?php
    }

    
}
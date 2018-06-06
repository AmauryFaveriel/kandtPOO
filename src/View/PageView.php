<?php

/**
 * Created by PhpStorm.
 * User: AmauryFaveriel
 * Date: 30/05/2018
 * Time: 17:19
 */

namespace View;

/**
 * Class PageView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */

class PageView
{
    /**
     * @param array|null $data
     */
    public function index(?array $data): void
    {
?>
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
                <td><a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.show&id='.$onePage['id']?>"><?=$onePage['id']?></a></td>
                <td><?=$onePage['slug']?></td>
                <td>
                    <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.edit&id='.$onePage['id']?>">Editer</a>
                    <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.delete&id='.$onePage['id']?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; endif;?>
        </table>
<?php
        $this->form('add', [], 'Ajouter');
    }

    /**
     * @param array|null $data
     */
    public function show(?array $data): void
    {
?>
        <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.index'?>">Liste</a>
    <h1><?=$data['title']?></h1>
    <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.edit&id='.$data['id']?>">Edit</a>
    <a href="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.delete&id='.$data['id']?>">Delete</a>
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

    /**
     * @param $action
     * @param array $data
     * @param $submitValue
     */
    public function form($action, $data = [], $submitValue)
    {
?>
        <form action="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.'.$action?>" method="post">
            <input type="hidden" name="page[id]" value="<?=$data['id'] ?? ''?>">
            <label>slug</label><br><input type="text" name="page[slug]" value="<?=$data['slug'] ?? ''?>" /><br>
            <label>title</label><br><input type="text" name="page[title]" value="<?=$data['title'] ?? ''?>" /><br>
            <label>h1</label><br><input type="text" name="page[h1]" value="<?=$data['h1'] ?? ''?>" /><br>
            <label>p</label><br><textarea name="page[p]" id="" cols="30" rows="10"><?=$data['p'] ?? ''?></textarea><br>
            <label>span-class</label><br><input type="text" name="page[span-class]" value="<?=$data['spanClass'] ?? ''?>" /><br>
            <label>span-text</label><br><input type="text" name="page[span-text]" value="<?=$data['spanText'] ?? ''?>" /><br>
            <label>img-alt</label><br><input type="text" name="page[img-alt]" value="<?=$data['img-alt'] ?? ''?>" /><br>
            <label>img-src</label><br><input type="text" name="page[img-src]" value="<?=$data['img-src'] ?? ''?>" /><br>
            <label>nav-title</label><br><input type="text" name="page[nav-title]" value="<?=$data['nav-title'] ?? ''?>" /><br>
            <input type="submit" value="<?=$submitValue?>">
        </form>
<?php
    }

    /**
     *
     */
    public function add()
    {

    }

    /**
     * @param array|null $data
     */
    public function delete(?array $data): void
    {
        ?>
        <h1>Voulez-vous supprimer <u><?=$data['slug']?></u></h1>
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
            <input type="hidden" name="page[id]" value="<?=$data['id']?>">
            <input type="submit" value="Delete">
            <input type="button" value="Cancel" onclick="history.back()">
        </form>
<?php
    }

    /**
     * @param array|null $data
     */
    public function edit(?array $data): void
    {
        $this->form('edit', $data, 'Modifier');
    }
}
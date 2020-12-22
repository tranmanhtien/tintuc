<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * News Entity
 *
 * @property int $id
 * @property string $tittle
 * @property int $author_id
 * @property int $newstype_id
 * @property string|null $description
 * @property int $tag_id
 * @property int|null $comment_id
 * @property string|null $cover_image
 * @property string $status
 * @property int|null $hot
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Newstype $newstype
 * @property \App\Model\Entity\Tag $tag
 * @property \App\Model\Entity\Comment $comment
 */
class News extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tittle' => true,
        'author_id' => true,
        'newstype_id' => true,
        'description' => true,
        'tag_id' => true,
        'comment_id' => true,
        'cover_image' => true,
        'status' => true,
        'hot' => true,
        'created' => true,
        'modified' => true,
        'author' => true,
        'newstype' => true,
        'tag' => true,
        'comment' => true,
    ];
}

<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "space".
 *
 * @property int $id
 * @property string $guid
 * @property string $name
 * @property string $description
 * @property int $join_policy
 * @property int $visibility
 * @property int $status
 * @property string $tags
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property string $ldap_dn
 * @property int $auto_add_new_members
 * @property int $contentcontainer_id
 * @property int $default_content_visibility
 * @property string $color
 * @property int $members_can_leave
 * @property string $url
 *
 * @property Group[] $groups
 */
class Space extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'space';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description', 'tags'], 'string'],
            [['join_policy', 'visibility', 'status', 'created_by', 'updated_by', 'auto_add_new_members', 'contentcontainer_id', 'default_content_visibility', 'members_can_leave'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['guid', 'name', 'url'], 'string', 'max' => 45],
            [['ldap_dn'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 7],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'name' => 'Name',
            'description' => 'Description',
            'join_policy' => 'Join Policy',
            'visibility' => 'Visibility',
            'status' => 'Status',
            'tags' => 'Tags',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'ldap_dn' => 'Ldap Dn',
            'auto_add_new_members' => 'Auto Add New Members',
            'contentcontainer_id' => 'Contentcontainer ID',
            'default_content_visibility' => 'Default Content Visibility',
            'color' => 'Color',
            'members_can_leave' => 'Members Can Leave',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['space_id' => 'id']);
    }
}

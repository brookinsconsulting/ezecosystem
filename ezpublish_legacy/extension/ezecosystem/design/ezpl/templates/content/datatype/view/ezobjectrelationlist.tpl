{def $content_object_relation_list_item=false()}
{section show=$attribute.content.relation_list}
{section var=Relations loop=$attribute.content.relation_list}
{if $Relations.item.in_trash|not()}
{set $content_object_relation_list_item=fetch( content, object, hash( object_id, $Relations.item.contentobject_id ) )}
{if $content_object_relation_list_item.class_identifier|eq('s3_file')}
    <p>{attribute_view_gui attribute=$content_object_relation_list_item.data_map.s3_file}{* <br /> *}</p>
{else}
    <p>{content_view_gui view=embed content_object=$content_object_relation_list_item}{* <br /> *}</p>
{/if}
{/if}
{/section}
{section-else}
{* 'There are no related objects.'|i18n( 'design/standard/content/datatype' ) *}
{/section}
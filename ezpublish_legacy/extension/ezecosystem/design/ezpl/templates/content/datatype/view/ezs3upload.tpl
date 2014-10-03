{* $attribute.data_text|wash( xhtml ) *}
{$attribute|attribute(show,1)}
{if $attribute.content}<a href={concat( 'http://', ezini( 'S3Settings', 'Bucket', 's3.ini' ),'.s3.amazonaws.com/', $attribute.content )|ezurl}>{$attribute.content|wash( xhtml )}</a> xxx.xx MB{/if}
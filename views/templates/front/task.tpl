{extends file="page.tpl"}

{block name='page_content_container'}
    <div class="furArea">
        <ul>
            <li>
                {l s='Number of products in the store' mod="moduleFurTest"}:&nbsp;{$nb_product}.
            </li>
            <br>
            <li>
                {l s='Categories' mod="moduleFurTest"}:
                <ul>
                    {foreach from=$categories item=cat}
                        <li>{$cat['name']}</li>
                    {/foreach}
                </ul>
            </li>
            <br/>
            <li>
                {$store_name}
            </li>
            <li>
                {$manufacturer['name']}
            </li>
            <br/>
        </ul>
    </div>
{/block}
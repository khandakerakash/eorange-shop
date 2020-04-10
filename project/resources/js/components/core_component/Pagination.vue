<template>
    <div>

        <div  :data-pagination="true" v-if="data.total > data.per_page">

            <ul>
                <li class="previous">
                    <a href="#"  :disabled="!data.prev_page_url" @click.prevent="selectPage(--data.current_page)"><i class="fa fa-angle-left"></i> Previous</a>

                </li>
                <!--<li v-for="n in getPages()"  :class="{ 'current': n == data.current_page }">-->
                    <!--<a href="#" @click.prevent="selectPage(n)">{{ n }}</a>-->
                    <!--</li>-->
                <li v-for="n in data.elements.first"  :class="{ 'current': n == data.current_page }">
                    <a href="#" @click.prevent="selectPage(n)">{{ n }}</a>
                </li>
                <li class="slider" v-if="data.elements.last.length">
                    <a> .... .... </a>
                </li>
                <li v-for="n in data.elements.last"  :class="{ 'current': n == data.current_page }" v-if="data.elements.last.length">
                    <a href="#" @click.prevent="selectPage(n)">{{ n }}</a>
                </li>
                <li class="next">
                    <a href="#"  :disabled="!data.next_page_url" @click.prevent="selectPage(++data.current_page)">Next <i class="fa fa-angle-right"></i></a>

                </li>
            </ul>
        </div>
        <div class="text-center ">

            <small class="text-muted" style="">Showing {{data.first_item}} to {{data.current_page*data.per_page}} of {{data.total}} entries</small>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                default: function() {
                    return {
                        current_page: 1,
                        data: [],
                        from: 1,
                        last_page: 1,
                        next_page_url: null,
                        per_page: 10,
                        prev_page_url: null,
                        to: 1,
                        total: 0,
                    }
                }
            },
            limit: {
                type: Number,
                default: 0
            }
        },
        methods: {
            selectPage: function(page) {
                if (page === '...') {
                    return;
                }

                this.$emit('pagination-change-page', page);
            },
            getPages: function() {
                if (this.limit === -1) {
                    return 0;
                }

                if (this.limit === 0) {
                    return this.data.last_page;
                }

                var current = this.data.current_page,
                    last = this.data.last_page,
                    delta = this.limit,
                    left = current - delta,
                    right = current + delta + 1,
                    range = [],
                    pages = [],
                    l;

                for (var i = 1; i <= last; i++) {
                    if (i == 1 || i == last || (i >= left && i < right)) {
                        range.push(i);
                    }
                }

                range.forEach(function (i) {
                    if (l) {
                        if (i - l === 2) {
                            pages.push(l + 1);
                        } else if (i - l !== 1) {
                            pages.push('...');
                        }
                    }
                    pages.push(i);
                    l = i;
                });

                return pages;
            }
        }
    }
</script>

<style scoped>

    [data-pagination],
    [data-pagination] *,
    [data-pagination] *:before,
    [data-pagination] *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-kerning: auto;
    }
    [data-pagination] {
        /*font-size: 8pt;*/
        /*line-height: 1;*/
        /*font-weight: 400;*/
        /*font-family: 'Open Sans', 'Source Sans Pro', Roboto, 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', 'Myriad Pro', 'Segoe UI', Myriad, Helvetica, 'Lucida Grande', 'DejaVu Sans Condensed', 'Liberation Sans', 'Nimbus Sans L', Tahoma, Geneva, Arial, sans-serif;*/
        -webkit-text-size-adjust: 100%;
        margin: 0 auto;
        text-align: center;
        transition: font-size .2s ease-in-out;
    }
    [data-pagination] ul {
        list-style-type: none;
        display: inline;
        /*font-size: 100%;*/
        margin: 0;
        padding: .5em;
    }
    [data-pagination] ul li {
        display: inline-block;
        border: 1px solid #777;
        width: auto;
        border-radius: 50%;
        margin-right:2px;
        margin-top:5px
    }
    [data-pagination] > a {
        /*font-size: 140%;*/
        font-size: 10pt;
    }
    [data-pagination] a {
        color: #777;
        /*font-size: 100%;*/
        padding: .5em;
    }
    [data-pagination] a:focus,
    [data-pagination] a:hover {
        color: #f60;
    }
    [data-pagination] li.current {
        background: rgba(0,0,0,.1);
        border: 1px solid #f60;

    }
    /* Disabled & Hidden Styles */

    [data-pagination] .disabled,
    [data-pagination] [hidden],
    [data-pagination] [disabled] {
        opacity: .5;
        pointer-events: none;
        cursor: no-drop;
    }
    [data-pagination] ul li.next{
        border: 1px solid #f60;
        border-radius: 0 50% 50% 0;
        background: rgba(0,0,0,.1);
        width: 100px;
    }
    [data-pagination] ul li.previous{
        border: 1px solid #f60;
        border-radius: 50% 0px 0px 50%;
        background: rgba(0,0,0,.1);
        width: 100px;
    }
    [data-pagination] ul li.slider{
        border: none;
        border-radius: 0;
        background: none;
    }
</style>
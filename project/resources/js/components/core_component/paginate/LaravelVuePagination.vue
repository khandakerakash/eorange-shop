<template>
    <renderless-laravel-vue-pagination  :data="data" :limit="limit" :show-disabled="showDisabled" v-on:pagination-change-page="onPaginationChangePage">
<div slot-scope="{ data, limit, computed, prevButtonEvents, nextButtonEvents, pageButtonEvents }">


    <ul role="navigation" class="pagination" v-if="computed.total > computed.perPage">
        <li :class="{'disabled': !computed.prevPageUrl,'page-item':true}" v-if="computed.prevPageUrl || showDisabled">

            <a class="page-link" href="#0" aria-label="Previous" :tabindex="!computed.prevPageUrl && -1" v-on="prevButtonEvents">
                <slot name="prev-nav">
                    <span ><i class="fa fa-arrow-left"></i> &nbsp; Previous</span>
                    <span class="sr-only">Previous</span>
                </slot>
            </a>

        </li>
        <li :class="{'page-item':true, 'active': page == computed.currentPage }" v-for="(page, key) in computed.pageRange" :key="key" >
            <a href="#0" class="page-link " v-if="page!=='...'" v-on="pageButtonEvents(page)">{{ page }}</a>
            <span class="page-link disabled" v-else  >...</span>
        </li>

        <li :class="{'page-item':true,'disabled': !computed.nextPageUrl}"  v-if="computed.nextPageUrl || showDisabled">
            <a class="page-link " href="#0" aria-label="Next" :tabindex="!computed.nextPageUrl && -1" v-on="nextButtonEvents">
                <slot name="next-nav">
                    <span aria-hidden="true">Next &nbsp; <i class="fa fa-arrow-right"></i></span>
                    <span class="sr-only">Next</span>
                </slot>
            </a>
        </li>
    </ul>
</div>
    </renderless-laravel-vue-pagination>
</template>

<script>
import RenderlessLaravelVuePagination from './RenderlessLaravelVuePagination.vue';

export default {
    props: {
        data: {
            type: Object,
            default: () => {}
        },
        limit: {
            type: Number,
            default: 2
        },
        showDisabled: {
            type: Boolean,
            default: true
        }
    },
    data:function(){
      return {
          per_page:20
      }
    },
    watch:{
      'per_page':function (val) {
          alert(val);
      }
    },
    methods: {
        onPaginationChangePage (page) {
            this.$emit('pagination-change-page', page);
        }
    },

    components: {
        RenderlessLaravelVuePagination
    }
}
</script>

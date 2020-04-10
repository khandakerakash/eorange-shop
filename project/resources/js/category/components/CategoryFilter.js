import React, {Component} from 'react';
import { connect } from 'react-redux';
import {listCategories,categoryProduct} from '../actions'

class CategoryFilter extends Component {

    componentDidMount(){
        this.props.listCategories();

    }
    onCategoryClick = async (e,slug) =>{
        e.preventDefault();

       await this.props.categoryProduct(slug);
    }
    geterateListView = ()=>{
        if(this.props.categories!==undefined && this.props.categories.categories.length!==0){
            var caturl = "/category/";
            var data = this.props.categories.categories.map((cat)=>(

                <li key={cat.id}>
                     <span href={`#${cat.id}`} aria-expanded="false" data-toggle="collapse">
                        <i className="fa fa-plus"></i><i className="fa fa-minus"></i>
                     </span>
                    <a onClick={(e)=>this.onCategoryClick(e,cat.slug)} href={`${caturl}${cat.slug}`}>{cat.name}</a>
                    {cat.sub_category.length > 0 ?
                        <ul id={`${cat.id}`} className="collapse">
                            { cat.sub_category.map((sub)=>(
                                <li key={sub.id}>
                              <span href={`#${sub.id}`} aria-expanded="false" data-toggle="collapse">
                                  <i className="fa fa-plus"></i><i className="fa fa-minus"></i>
                              </span>
                                    <a onClick={(e)=>this.onCategoryClick(e,sub.slug)} href={`${caturl}${sub.slug}`}>{sub.name}</a>
                                    {sub.sub_category.length>0?
                                    <ul id={`${sub.id}`} className="collapse">
                                        {sub.sub_category.map((child)=>(
                                            <li key={child.id}><i className="fa fa-angle-right"></i><a
                                                onClick={(e)=>this.onCategoryClick(e,child.slug)}   href={`${caturl}${child.slug}`}>{child.name}</a></li>
                                        ))}

                                    </ul>
                                        :""}
                                </li>
                            ))}

                        </ul>
                   :"" }
                </li>



            ));

            return (
                <ul>
                {data}
                </ul>
            )
        }else{
            return (
                <div>Loading</div>
            )
        }
    }
    render() {
        return (
            <div className="product-filter-option">
                <h2 className="filter-title">All Categories</h2>
                {this.geterateListView()}


            </div>
        );
    }
}


function mapStateToProps(state){
    return {
        categories: state.CategoryList,
        currentPage: state.CategoryList.currentPage
    };
}
export default connect(mapStateToProps,{
    listCategories,
    categoryProduct
})(CategoryFilter);

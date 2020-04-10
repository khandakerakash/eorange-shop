import React, {Component} from 'react';
import ReactPaginate from 'react-paginate';
import {connect} from "react-redux";
import {categoryProduct} from "../actions";

class PaginationCategory extends Component {

    handlePageClick = (data)=>{
        let selected = data.selected;
        this.props.categoryProduct(this.props.selectedCategory.slug, (selected+1));
        

    }
    render() {
        return (
            <div className="row">
                <div className="col-md-12 text-center">
                    <ReactPaginate previousLabel={"«"}
                                   nextLabel={"»"}
                                   breakLabel={"..."}
                                   breakClassName={"break-me"}
                                   pageCount={this.props.pageCount}
                                   marginPagesDisplayed={2}
                                   pageRangeDisplayed={5}
                                   onPageChange={this.handlePageClick}
                                   containerClassName={"pagination"}
                                   subContainerClassName={"pages pagination"}
                                   activeClassName={"active"}/>

                </div>
            </div>
        );
    }
}



function mapStateToProps(state) {
    return {
        currentPage: state.CategoryList.currentPage,
        pageCount: state.CategoryList.pageCount,
        isCategory:state.CategoryList.isCategory,
        isSubCategory:state.CategoryList.isSubCategory,
        isChildCategory:state.CategoryList.isChildCategory,
        selectedCategory:state.CategoryList.selectedCategory
    };
}

export default connect(mapStateToProps, {
    categoryProduct
})(PaginationCategory);


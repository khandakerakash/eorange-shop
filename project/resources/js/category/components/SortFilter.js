import React, {Component} from 'react';
import {connect} from "react-redux";
import {categoryProductSorting} from "../actions";

class SortFilter extends Component {
    state = {
        value : ""
    }
    handlePageClick = (e)=>{
        // let selected = data.selected;

        this.setState({
            value:e.target.value,
        });
        this.props.categoryProductSorting(this.props.selectedCategory.slug,e.target.value, 1);


    }
    generateCatName = ()=>{

        return this.props.selectedCategory.name;

    }
    render() {
        return (
            <div className="row">
                <div className="col-lg-8 col-md-8 col-sm-6">
                    <h3>{this.generateCatName()}</h3>
                </div>
                <div className="col-lg-4 col-md-4 col-sm-6">
                    <div className="form-group sort-by-popularity">
                        <label className="control-label">Sort By</label>
                        <select  className="form-control" onChange={(e)=>this.handlePageClick(e)} value={this.state.value}>

                            <option value="">select sort</option>
                            <option value="new">Sort By Latest Product</option>
                            <option value="old">Sort By Oldest Product</option>
                            <option value="low">Sort By Lowest Price</option>
                            <option value="high">Sort By Highest Price</option>
                        </select>
                    </div>
                </div>
            </div>


        );
    }
}



function mapStateToProps(state) {
    return {
        currentPage: state.CategoryList.currentPage,
        pageCount: state.CategoryList.pageCount,
        selectedCategory:state.CategoryList.selectedCategory

    };
}

export default connect(mapStateToProps, {
    categoryProductSorting
})(SortFilter);



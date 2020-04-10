import React, {Component} from 'react';
import {connect} from 'react-redux';
import {categoryProduct} from '../actions'

import SingleProduct from "./SingleProduct";

class ProductList extends Component {

    componentDidMount() {
        const url = window.location.pathname;
        const arrayUrl = url.substring(1).split("/");

        this.props.categoryProduct(arrayUrl[1]);
    }

    generateProductList = () => {
        if (this.props.products.length == 0) {
            return (
                <div className="row">
                    <div className="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1>no product found</h1>
                    </div>
                </div>
            )
        } else {
            const productList = this.props.products.map((product) => (
                <SingleProduct key={product.id} product={product}/>
            ));
            return (
                <div className="row">
                    {productList}
                </div>


            );
        }
    }

    render() {
        return this.generateProductList();

    }
}


function mapStateToProps(state) {
    return {
        products: state.CategoryList.products
    };
}

export default connect(mapStateToProps, {
    categoryProduct
})(ProductList);


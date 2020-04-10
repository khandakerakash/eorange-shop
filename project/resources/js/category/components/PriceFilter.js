import React, {Component} from 'react';
import ReactBootstrapSlider from 'react-bootstrap-slider';
import {connect} from "react-redux";
import {categoryProductPriceFilter} from "../actions";

class PriceFilter extends Component {
    state = {
        minValue: 0,
        maxValue: 200
    }
    onSliderChange = (e) => {
        var value = e.target.value;


        this.setState({
            minValue: value[0],
            maxValue: value[1],
        });


    }
    formSubmit = (e)=>{
        e.preventDefault();
        var value = [this.state.minValue, this.state.maxValue];
        this.props.categoryProductPriceFilter(this.props.selectedCategory.slug,value[0],value[1] ,1);

    }

    render() {
        return (
            <div className="product-filter-option">
                <h2 className="filter-title">Price</h2>
                <form onSubmit={(e)=>this.formSubmit(e)}>
                    <div className="form-group padding-bottom-10">
                        <ReactBootstrapSlider
                            value={[this.state.minValue, this.state.maxValue]}
                            change={this.onSliderChange}
                            slideStop={this.onSliderChange}
                            step={50}
                            max={1000}
                            min={0}
                            orientation="horizontal"/>
                    </div>
                    <div className="form-group">
                        <input style={{"direction": "ltr"}} type="text" id="price-min" name="min"
                               className="price-input"
                               value={this.state.minValue}/>
                        <i className="fa fa-minus"></i>
                        <input style={{"direction": "ltr"}} type="text" id="price-max" name="max"
                               className="price-input"
                               value={this.state.maxValue}/>
                        <input style={{"direction": "ltr"}} type="submit" className="price-search-btn"
                               value="Filter Price"/>
                    </div>
                </form>

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
        categoryProductPriceFilter
    })(PriceFilter);



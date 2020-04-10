import SelectedCategoryFull from "./components/SelectedCategoryFull";

require('../bootstrap');
import React, {Component} from 'react';
import {createStore, applyMiddleware} from 'redux';
import thunk from "redux-thunk";
import reducers from './reducers';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';

import CategoryFilter from "./components/CategoryFilter";
import ProductList from "./components/ProductList";
import PaginationCategory from "./components/PaginationCategory";
import SortFilter from "./components/SortFilter";
import PriceFilter from "./components/PriceFilter";



class App extends Component {
    render() {
        return (
            <div>

                {/*<SelectedCategoryFull/>*/}
                <div className="category-content">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-3 col-md-3 col-sm-4 category-left-side">
                                <div className="category-filter-sidebar mb-xs-5">
                                    <CategoryFilter/>
                                    <PriceFilter/>
                                    {/*<TagFilter/>*/}
                                </div>



                            </div>

                            <div className="col-lg-9 col-md-9 col-sm-8 category-right-side">
                                <SortFilter/>
                                <hr className="category-content-line"/>
                                <div className="category-content-items">
                                    <ProductList/>

                                    <div className="row text-center">
                                        <PaginationCategory/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>


            </div>
        )
    };
}

const store = createStore(reducers, applyMiddleware(thunk));
ReactDOM.render(
    <Provider store={store}>
        <App/>
    </Provider>
    , document.getElementById('categoryComponent'));



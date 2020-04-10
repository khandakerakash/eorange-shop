import React, {Component} from 'react';
import PropTypes from 'prop-types';

class TagFilter extends Component {
    render() {
        return (
            <div className="product-filter-option">
                <h2 className="filter-title">Popular Tags</h2>
                <div className="product-filter-content tags">
                    <a href="http://eorangeshop.test/tags/a">a</a>
                    <a href="http://eorangeshop.test/tags/b">b</a>
                    <a href="http://eorangeshop.test/tags/c">c</a>
                    <a href="http://eorangeshop.test/tags/d">d</a>
                    <a href="http://eorangeshop.test/tags/x">x</a>
                    <a href="http://eorangeshop.test/tags/y">y</a>
                    <a href="http://eorangeshop.test/tags/z">z</a>
                    <a href="http://eorangeshop.test/tags/k">k</a>
                </div>
            </div>
        );
    }
}

TagFilter.propTypes = {};

export default TagFilter;

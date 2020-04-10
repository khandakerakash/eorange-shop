import React, {Component} from 'react';
import styled from 'styled-components';

class Featured extends Component {

    render() {
        const Wrapper = styled.span`
            background-color: ${this.props.color} !important;
            &:after {
               border-left: 10px solid ${this.props.color} !important
            }
`;
        return (
            <Wrapper>

                {this.props.title}

            </Wrapper>
        );
    }
}

Featured.propTypes = {};

export default Featured;

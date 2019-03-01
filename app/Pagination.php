<?php namespace App;

use Landish\Pagination\Pagination as BasePagination;

class Pagination extends BasePagination {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<div class="table-pagination-nav">
    

    
    %s 
    <span class="pages">
    %s 
    </span>
    %s
    
    
    
    </div>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<a href="%s">%s</a>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<a href="#">%s</a>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<a href="#">%s</a>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<i class="icon gicon-arrow-left"></i><span class="prev">Previous</span>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<span class="next">Next</span><i class="icon gicon-arrow-right"></i>';

    /***
     * "Dots" text.
     *
     * @var string
     */
    protected $dotsText = '...';

    /**
     * Get pagination wrapper HTML.
     *
     * @return string
     */
    protected function getPaginationWrapperHTML() {
        return $this->paginationWrapper;
    }

    /**
     * Get available page wrapper HTML.
     *
     * @return string
     */
    protected function getAvailablePageWrapperHTML() {
        return $this->availablePageWrapper;
    }

    /**
     * Get active page wrapper HTML.
     *
     * @return string
     */
    protected function getActivePageWrapperHTML() {
        return $this->activePageWrapper;
    }

    /**
     * Get disabled page wrapper HTML.
     *
     * @return string
     */
    protected function getDisabledPageWrapperHTML() {
        return $this->disabledPageWrapper;
    }

    /**
     * Get previous button text.
     *
     * @return string
     */
    protected function getPreviousButtonText() {
        return $this->previousButtonText;
    }

    /**
     * Get next button text.
     *
     * @return string
     */
    protected function getNextButtonText() {
        return $this->nextButtonText;
    }

    /***
     * Get "dots" text.
     *
     * @return string
     */
    protected function getDotsText() {
        return $this->dotsText;
    }

 
}
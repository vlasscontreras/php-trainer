<?php

namespace Trainer\Principles\SingleResponsibility;

use DateTime;

class SalesReporter
{
    /**
     * Repository
     *
     * @var RepositoryInterface
     */
    protected RepositoryInterface $repository;

    /**
     * Set up reporter
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = new TransactionRepository();
    }

    /**
     * Get the total sales between start and end date.
     *
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param OutputInterface $formatter
     * @return void
     */
    public function between(DateTime $startDate, DateTime $endDate, OutputInterface $formatter): void
    {
        $records = $this->repository
            ->where('start_date', '>=', $startDate->format('Y-m-d'))
            ->where('end_date', '<=', $endDate->format('Y-m-d'))
            ->get();

        $sales = array_sum($records);

        $formatter->render($sales);
    }
}

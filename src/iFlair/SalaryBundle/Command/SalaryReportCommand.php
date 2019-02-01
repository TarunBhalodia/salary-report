<?php

namespace iFlair\SalaryBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SalaryReportCommand extends Command implements ContainerAwareInterface
{
	/**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    /*
    * Console command configuration
    * To execute command php bin/console generate:salary-report filename
    */
	protected function configure()
	{
	    $this->setName('generate:salary-report')
	    	->addArgument(
                'filename',
                InputArgument::REQUIRED,
                'Name of salary report file'
            )
	    	->setDescription('Generate salary report')
	    	->setHelp('This command allows you to generate salary report...')
	    ;
	}

	/*
	* Entry point of command
	* Process month is calculated based on current month
	*/
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$fileName = $input->getArgument('filename').".csv";
		$filePath = $this->container->getParameter('file_salary_payment').$fileName;

		if(file_exists($filePath)) {
			$output->writeln('<error>File already exist : '.$fileName.'</error>');
			exit;
		}

		$handle = fopen($filePath, 'w+');
		fputcsv($handle, array('Month Name', 'Salary Date', 'Bonus Date'),';');

		$bonusDate = $this->getBonusDates();
		$salaryDate = $this->getSalaryDates();

		
		$finalReport = array();

		foreach ($salaryDate as $key => $value) {
			$finalReport[$key]['month'] = $key;
			$finalReport[$key]['salary'] = $value;
		}

		foreach ($bonusDate as $key => $value) {
			$finalReport[$key]['month'] = $key;
			$finalReport[$key]['bonus'] = $value;
		}

		foreach ($finalReport as $reportData) {
			fputcsv($handle, $reportData);
		}

		fclose($handle);

	    // outputs multiple lines to the console (adding "\n" at the end of each line)
	    $output->writeln([
	        '<info>Salary Payment Date Report Generated in file :</info>',
	        '<info> => '.$filePath.'</info>',
	        '',
	    ]);
	}

	/*
	* To get the list of bonus dates for all months
	*/
	protected function getBonusDates()
	{
		$bonusDate = array();
		
		$currentMonth = date("n");
		$currentYear = date("Y");

		while ( $currentMonth <= 12 ) {
			$processingDate = date('d-m-Y', strtotime("15-".$currentMonth."-".$currentYear));
			$processingDate = $this->getValidBonusDate($processingDate);
			if(strtotime($processingDate) >= strtotime(date("d-m-Y"))) {
				$monthName = date("F",strtotime($processingDate));
				$bonusDate[$monthName] = $processingDate;
			}
			$currentMonth++;
		}
		
		return $bonusDate;
	}

	/*
	* To get the list of salary dates for all months
	*/
	protected function getSalaryDates()
	{
		$salaryDate = array();
		//To check for another year starting from January
		$currentMonth = date("n");
		$currentYear = date("Y");
		
		while ( $currentMonth <= 12 ) {
			$lastDate = date('t', strtotime("1-".$currentMonth."-".$currentYear));
			$processingDate = date('d-m-Y', strtotime($lastDate."-".$currentMonth."-".$currentYear));
			$processingDate = $this->getValidSalaryDate($processingDate);
			if(strtotime($processingDate) >= strtotime(date("d-m-Y"))) {
				$monthName = date("F",strtotime($processingDate));
				$salaryDate[$monthName] = $processingDate;
			}
			$currentMonth++;
		}
		return $salaryDate;
	}

	/*
	* To validate bonus date against weekend & retrieve next Wednesday
	*/
	protected function getValidBonusDate($processingDate)
	{
		$day = date('l', strtotime($processingDate));

		switch ($day) {
			case 'Saturday':
				$processingDate = date('d-m-Y', strtotime($processingDate . ' +4 day'));
				break;
			
			case 'Sunday':
				$processingDate = date('d-m-Y', strtotime($processingDate . ' +3 day'));
				break;
		}

		return $processingDate;
	}

	/*
	* To validate salary date against weekend & retrieve previous workday
	*/
	protected function getValidSalaryDate($processingDate)
	{
		$day = date('l', strtotime($processingDate));

		switch ($day) {
			case 'Saturday':
				$processingDate = date('d-m-Y', strtotime($processingDate.'-1 day'));
				break;
			
			case 'Sunday':
				$processingDate = date('d-m-Y', strtotime($processingDate.'-2 days'));
				break;
		}

		return $processingDate;
	}
}

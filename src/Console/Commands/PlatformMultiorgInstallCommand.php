<?php

declare (strict_types = 1);

namespace Kamansoft\PlatformMultiorg\Console\Commands;

use Illuminate\Console\Command;
use Kamansoft\PlatformMultiorg\PlatformMultiorgServiceProvider;
use Orchid\Platform\Dashboard;

class PlatformMultiorgInstallCommand extends Command {

	/**
	 * The console command signature.
	 *
	 * @var string
	 */
	protected $signature = 'plaform-multiorg:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'orchid platform Multi organizational batch install';

	/**
	 * Execute the console command.
	 *
	 * @param Dashboard $dashboard
	 *
	 * @return void
	 */
	public function handle(Dashboard $dashboard) {
		$this->info('Installation started. Please wait...');

		$this
			->executeCommand('vendor:publish', [
				'--provider' => PlatformMultiorgServiceProvider::class,
				//'--force' => true,
				'--tag' => [
					'plaform-multiorg-migrations',
				],

			]);


		//->settingSystemUserEnvVars();
		//->executeCommand('storage:link')
		//->changeUserModel();

		$this->info('Completed!');
		$this->info('---------------');

		//event(new InstallEvent($this));
	}

	/**
	 * @param string $command
	 * @param array $parameters
	 *
	 * @return $this
	 */
	private function executeCommand(string $command, array $parameters = []): self {
		try {
			$result = $this->call($command, $parameters);
		} catch (\Exception $exception) {
			$result = 1;
			$this->alert($exception->getMessage());
		}

		if ($result) {
			$parameters = http_build_query($parameters, '', ' ');
			$parameters = str_replace('%5C', '/', $parameters);
			$this->alert("An error has occurred. The '{$command} {$parameters}' command was not executed");
		}

		return $this;
	}



}

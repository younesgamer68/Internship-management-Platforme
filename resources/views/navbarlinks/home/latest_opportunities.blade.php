@extends('layouts.public')


@section('title', 'Latest Opportunities — Interlink')
@section('meta_description', 'Browse and apply to high-paying, vetted technical internships at Stripe, Vercel, Linear, Supabase, and other elite startups.')
@section('nav_opportunities', 'text-zinc-950 font-semibold bg-zinc-50 border-b-2 border-zinc-900')

@section('content')
<div x-data="{
    activeJobId: 1,
    applyModalOpen: false,
    filters: {
        types: [],
        locations: [],
        stipend: ''
    },
    searchQuery: '',
    jobs: [
        {
            id: 1,
            title: 'Frontend Engineer Intern',
            company: 'Vercel',
            logo: 'V',
            logoBg: 'bg-black',
            location: 'Remote',
            type: 'Engineering',
            duration: '6 Months',
            stipend: '$55.00 / hr',
            stipendValue: 55,
            posted: '2 hours ago',
            deadline: 'June 30, 2026',
            matchScore: '96%',
            description: 'We are looking for a Frontend Engineering Intern to join our Next.js Framework team. You will work directly with core maintainers on performance optimizations, bundler improvements, and developer experience enhancements.',
            stack: ['React', 'Next.js', 'Rust', 'TypeScript', 'TailwindCSS'],
            responsibilities: [
                'Contribute to open-source Next.js repository improvements.',
                'Build and profile benchmark applications to identify render bottlenecks.',
                'Refactor core layout routing packages to reduce client bundle size.',
                'Collaborate with developers in Discord to triage and fix framework bugs.'
            ],
            requirements: [
                'Strong familiarity with React core concepts (Suspense, Server Components).',
                'Demonstrated contribution to technical side-projects or open source.',
                'Basic understanding of build tools (Webpack, Turbopack, or Vite).',
                'Enrolled in a CS or related undergraduate/postgraduate degree program.'
            ],
            team: 'You will join a distributed team of 8 core framework engineers, reporting directly to the Director of Next.js Core.'
        },
        {
            id: 2,
            title: 'Backend Systems Intern (API Core)',
            company: 'Stripe',
            logo: 'S',
            logoBg: 'bg-[#635bff]',
            location: 'San Francisco, CA (Hybrid)',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$62.50 / hr',
            stipendValue: 62.5,
            posted: '1 day ago',
            deadline: 'July 15, 2026',
            matchScore: '91%',
            description: 'Stripe\'s API infrastructure team handles billions of requests daily. As an intern, you will contribute to the core payment ledger pipelines, working with Ruby and Go to optimize transaction latency.',
            stack: ['Ruby', 'Go', 'Scala', 'PostgreSQL', 'Redis', 'Kafka'],
            responsibilities: [
                'Refactor high-throughput API endpoints to optimize database load.',
                'Write unit and integration tests for new checkout security protocols.',
                'Monitor production performance graphs and assist in debugging latency spikes.',
                'Assist in documenting internal API schemas for compliance auditing.'
            ],
            requirements: [
                'Proficiency in Ruby, Go, Java, or C++ with strong knowledge of OOP.',
                'Familiarity with relational database design and SQL query profiling.',
                'Understanding of distributed systems and RESTful API standards.',
                'Excellent debugging and collaborative communication skills.'
            ],
            team: 'You will work with the Billing Infrastructure team, mentored by a Senior Staff Systems Engineer.'
        },
        {
            id: 3,
            title: 'Product Design Intern',
            company: 'Figma',
            logo: 'F',
            logoBg: 'bg-[#f24e1e]',
            location: 'New York, NY (Hybrid)',
            type: 'Design',
            duration: '6 Months',
            stipend: '$48.00 / hr',
            stipendValue: 48,
            posted: '3 days ago',
            deadline: 'July 10, 2026',
            matchScore: '88%',
            description: 'Join the Editor Design team at Figma. You will help design the next generation of canvas tools, layout rules, and collaboration features used by millions of designers worldwide.',
            stack: ['Figma', 'UI/UX Design', 'Design Systems', 'HTML/CSS', 'Prototyping'],
            responsibilities: [
                'Conduct user research and compile usability feedback on layout tools.',
                'Create high-fidelity interactive prototypes of canvas interaction ideas.',
                'Contribute to our internal design system component guidelines.',
                'Present design iterations weekly to cross-functional product loops.'
            ],
            requirements: [
                'A strong portfolio demonstrating interaction design and visual hierarchy.',
                'Proficiency with Figma tools and component variant systems.',
                'Understanding of front-end constraints (HTML, CSS, flexbox).',
                'Strong writing skills to articulate design decisions clearly.'
            ],
            team: 'You will be embedded in the Editor Canvas team, working alongside 3 product designers and 6 engineers.'
        },
        {
            id: 4,
            title: 'Infrastructure & DB Intern',
            company: 'Supabase',
            logo: 'S',
            logoBg: 'bg-[#3ecf8e]',
            location: 'Remote',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$50.00 / hr',
            stipendValue: 50,
            posted: '4 days ago',
            deadline: 'July 5, 2026',
            matchScore: '85%',
            description: 'Supabase is an open source Firebase alternative. As an infrastructure intern, you will work on PostgreSQL extensions, connection pooling performance, and cloud resource orchestrations.',
            stack: ['PostgreSQL', 'Go', 'Rust', 'Docker', 'Kubernetes', 'AWS'],
            responsibilities: [
                'Develop and benchmark Postgres extension features.',
                'Optimize Connection Pooler (PgBouncer) metrics logging pipelines.',
                'Contribute to database backup restoration speed validation scripts.',
                'Address issues on our open-source GitHub repositories.'
            ],
            requirements: [
                'Strong database fundamentals (indexing, ACID, query parsing).',
                'Familiarity with Docker and basic Linux server admin.',
                'Experience coding in Go or Rust.',
                'Passionate about open-source projects.'
            ],
            team: 'You will join the Database Orchestration team, reporting to the Head of Cloud Platforms.'
        },
        {
            id: 5,
            title: 'Developer Relations Intern',
            company: 'Resend',
            logo: 'R',
            logoBg: 'bg-zinc-800',
            location: 'Remote',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$45.00 / hr',
            stipendValue: 45,
            posted: '5 days ago',
            deadline: 'July 20, 2026',
            matchScore: '93%',
            description: 'Help build the future of email representation at Resend. You will work on SDKs, developer documentation, integration templates, and create sample apps to highlight email API features.',
            stack: ['React', 'Node.js', 'Next.js', 'TypeScript', 'Email API', 'TailwindCSS'],
            responsibilities: [
                'Build open-source email template component examples using React Email.',
                'Triage and resolve community integration queries on GitHub.',
                'Write technical blog guides detailing integration setups.',
                'Help maintain Node, Python, and Go SDK helper libraries.'
            ],
            requirements: [
                'Demonstrated interest in DevRel, writing, or education.',
                'Solid JavaScript/TypeScript foundations.',
                'Prior experience building apps with Node.js or React.',
                'Enrolled in CS or equivalent communications engineering program.'
            ],
            team: 'You will join our small DevRel loops team, working directly alongside the Founder and DevRel Lead.'
        },
        {
            id: 6,
            title: 'Full-Stack Engineer Intern',
            company: 'Retool',
            logo: 'R',
            logoBg: 'bg-[#2563EB]',
            location: 'San Francisco, CA (On-site)',
            type: 'Engineering',
            duration: '6 Months',
            stipend: '$58.00 / hr',
            stipendValue: 58,
            posted: '1 week ago',
            deadline: 'July 22, 2026',
            matchScore: '89%',
            description: 'Join the Core Component editor team at Retool. You will design, build, and deploy new UI components and server integrations to help developers construct internal apps in minutes.',
            stack: ['React', 'Node.js', 'TypeScript', 'PostgreSQL', 'Docker'],
            responsibilities: [
                'Develop premium UI components (charts, calendars, rich grids) for builder canvas.',
                'Implement database integrations via core connection engines.',
                'Optimize front-end layout rendering speeds in high-component dashboards.',
                'Collaborate with Product Management to review builder feature requests.'
            ],
            requirements: [
                'Advanced knowledge of JavaScript, modern React, and Node.js.',
                'Familiarity with SQL database queries and performance optimizations.',
                'Experience working in a fast-paced software team environment.',
                'Strong architectural intuition for reusable UI components.'
            ],
            team: 'You will join the Core Studio Team, mentored by our Senior UI Engineering Manager.'
        },
        {
            id: 7,
            title: 'Solutions Architect Intern',
            company: 'Amazon Web Services',
            logo: 'A',
            logoBg: 'bg-[#ff9900]',
            location: 'Seattle, WA (Hybrid)',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$52.50 / hr',
            stipendValue: 52.5,
            posted: '1 week ago',
            deadline: 'July 18, 2026',
            matchScore: '81%',
            description: 'Help enterprise clients build resilient systems on AWS. You will develop proof-of-concept solutions, architectural design templates, and review client architectures for reliability.',
            stack: ['AWS', 'Cloud Architecture', 'Python', 'Terraform', 'Kubernetes'],
            responsibilities: [
                'Build Infrastructure-as-Code templates using Terraform and CloudFormation.',
                'Assist Solutions Architects in compiling client workload reviews.',
                'Design serverless migration templates for database clients.',
                'Participate in cloud security compliance audits.'
            ],
            requirements: [
                'Basic understanding of networking (VPC, DNS, Subnets) and cloud storage.',
                'Proficiency in Python or Bash scripting.',
                'Currently studying Cloud Computing, CS, or equivalent.',
                'AWS Cloud Practitioner certification is a major plus.'
            ],
            team: 'You will join the Enterprise Accounts Solution team, mentored by a Senior Solutions Architect.'
        },
        {
            id: 8,
            title: 'Security Operations Intern',
            company: 'Cloudflare',
            logo: 'C',
            logoBg: 'bg-[#f38020]',
            location: 'Austin, TX (On-site)',
            type: 'Engineering',
            duration: '6 Months',
            stipend: '$56.00 / hr',
            stipendValue: 56,
            posted: '2 weeks ago',
            deadline: 'July 25, 2026',
            matchScore: '87%',
            description: 'Contribute to defending internet services from cyber threats. Work with our Security Operations Center to analyze attack patterns, monitor networks, and refine Web Application Firewall rules.',
            stack: ['Rust', 'Python', 'Go', 'Linux', 'Network Security', 'WAF'],
            responsibilities: [
                'Analyze logs to discover new DDoS and SQL injection vectors.',
                'Refine Lua and Rust script handlers within CDN proxies.',
                'Build dashboards to display real-time attack metrics for the security team.',
                'Participate in simulated pen testing audits.'
            ],
            requirements: [
                'Strong knowledge of TCP/IP, DNS, TLS, and HTTP protocols.',
                'Familiarity with Linux command line and system administration.',
                'Programming skills in Go, Rust, or Python.',
                'Strong analytical and threat identification mindset.'
            ],
            team: 'You will join the Core Security and CDN Team, reporting to the VP of Network Defense.'
        },
        {
            id: 9,
            title: 'Machine Learning Research Intern',
            company: 'Pinecone',
            logo: 'P',
            logoBg: 'bg-[#2b1b54]',
            location: 'Remote',
            type: 'Engineering',
            duration: '6 Months',
            stipend: '$65.00 / hr',
            stipendValue: 65,
            posted: '2 weeks ago',
            deadline: 'July 1, 2026',
            matchScore: '94%',
            description: 'Research high-dimensional vector search indexing algorithms. You will prototype next-generation similarity indexing models to optimize database memory utilization and search recall.',
            stack: ['Python', 'Rust', 'C++', 'PyTorch', 'Vector Databases', 'Algorithms'],
            responsibilities: [
                'Implement similarity search algorithms in C++ and benchmark recall rates.',
                'Verify vector quantizing models using PyTorch.',
                'Optimize disk-access latency algorithms for memory-mapped vectors.',
                'Write research documentation outlining vector indexing efficiency.'
            ],
            requirements: [
                'Enrolled in a PhD or research-heavy MS in CS, Math, or related fields.',
                'Strong mathematical foundations in linear algebra and statistics.',
                'High-proficiency programming in C++, Rust, or Python.',
                'Experience using vector search engines or deep learning frameworks.'
            ],
            team: 'You will join the Database Core Research Lab, collaborating with 4 AI researchers and mathematicians.'
        },
        {
            id: 10,
            title: 'Infrastructure & Site Reliability Intern',
            company: 'Railway',
            logo: 'R',
            logoBg: 'bg-[#0b0c10]',
            location: 'Remote',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$50.00 / hr',
            stipendValue: 50,
            posted: '2 weeks ago',
            deadline: 'June 25, 2026',
            matchScore: '83%',
            description: 'Maintain and scale our serverless application deployment platform. You will work on container scaling, network load balancing, and internal Kubernetes cluster orchestration tools.',
            stack: ['Go', 'TypeScript', 'Docker', 'Kubernetes', 'GCP', 'Redis'],
            responsibilities: [
                'Develop scripts to automate cloud instance scaling thresholds.',
                'Benchmark ingress routing performance inside Kubernetes networks.',
                'Improve internal incident logging and Slack integration bots.',
                'Contribute to infrastructure scaling tests.'
            ],
            requirements: [
                'Hands-on experience with Docker container configuration.',
                'Solid command of Go or Python.',
                'Understanding of cloud server basics (GCP, AWS, or DigitalOcean).',
                'Passion for simplifying developer infrastructure.'
            ],
            team: 'You will join the Platform Infrastructure Team, mentored by a Senior Infrastructure Architect.'
        },
        {
            id: 11,
            title: 'Design Systems Intern',
            company: 'Tailwind Labs',
            logo: 'T',
            logoBg: 'bg-[#38bdf8]',
            location: 'Remote',
            type: 'Design',
            duration: '3 Months',
            stipend: '$46.00 / hr',
            stipendValue: 46,
            posted: '3 weeks ago',
            deadline: 'July 15, 2026',
            matchScore: '90%',
            description: 'Help refine Tailwind CSS documentation, create UI components for Tailwind UI, and assist in designing component assets for Headless UI packages.',
            stack: ['Figma', 'TailwindCSS', 'HTML/CSS', 'JavaScript', 'Design Systems'],
            responsibilities: [
                'Create responsive Tailwind UI component layouts in Figma.',
                'Convert Figma designs into fully functional HTML/CSS templates.',
                'Conduct usability checks on our utility documentation design.',
                'Help build interactive component templates for React and Vue.'
            ],
            requirements: [
                'Deep understanding of utility-first CSS concepts.',
                'Outstanding eye for micro-interactions, layout, and modern typography.',
                'Proficient with Figma component systems and auto-layouts.',
                'Comfortable writing clean HTML/CSS.'
            ],
            team: 'You will join the Tailwind Studio team, working directly with our UI Designers and Authors.'
        },
        {
            id: 12,
            title: 'Database Engineer Intern',
            company: 'Prisma',
            logo: 'P',
            logoBg: 'bg-[#0c344b]',
            location: 'Remote',
            type: 'Engineering',
            duration: '3 Months',
            stipend: '$49.00 / hr',
            stipendValue: 49,
            posted: '3 weeks ago',
            deadline: 'July 28, 2026',
            matchScore: '86%',
            description: 'Improve modern developer-friendly ORM performance. You will write unit integration tests, debug query engine bugs, and help optimize generated SQL queries for Postgres and MySQL.',
            stack: ['TypeScript', 'Rust', 'PostgreSQL', 'MySQL', 'MongoDB', 'ORM'],
            responsibilities: [
                'Write integration tests for new Prisma schema data types.',
                'Investigate and resolve query engine performance bugs on GitHub.',
                'Benchmark Prisma client query latency against raw SQL drivers.',
                'Assist in document translation and API guides updates.'
            ],
            requirements: [
                'Strong TypeScript programming skills.',
                'Familiarity with SQL relational database operations (joins, transactions).',
                'Knowledge of Rust or query compiler structures is a plus.',
                'Good technical writing capability.'
            ],
            team: 'You will work inside the Client Engine Team, reporting to the Engineering Director.'
        }
    ],
    get activeJob() {
        return this.jobs.find(j => j.id === this.activeJobId) || this.jobs[0];
    },
    get filteredJobs() {
        return this.jobs.filter(job => {
            // Search text
            if (this.searchQuery && !job.title.toLowerCase().includes(this.searchQuery.toLowerCase()) && !job.company.toLowerCase().includes(this.searchQuery.toLowerCase())) {
                return false;
            }
            // Job Type filter
            if (this.filters.types.length > 0 && !this.filters.types.includes(job.type)) {
                return false;
            }
            // Location filter
            if (this.filters.locations.length > 0) {
                const isMatch = this.filters.locations.some(loc => {
                    if (loc === 'Remote') return job.location.includes('Remote');
                    if (loc === 'Hybrid') return job.location.includes('Hybrid');
                    if (loc === 'On-site') return !job.location.includes('Remote') && !job.location.includes('Hybrid');
                    return false;
                });
                if (!isMatch) return false;
            }
            // Min Stipend filter
            if (this.filters.stipend) {
                const min = parseFloat(this.filters.stipend);
                if (job.stipendValue < min) return false;
            }
            return true;
        });
    }
}" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col h-[calc(100vh-4rem)]">
    
    <!-- Search Bar Panel -->
    <div class="mb-2 flex flex-col md:flex-row gap-4 bg-white p-4 rounded-xl border border-zinc-200 shadow-soft">
        <div class="flex-grow relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-zinc-400 text-sm"></i>
            <input 
                x-model="searchQuery" 
                type="text" 
                placeholder="Search job titles, skills, or companies (e.g. Next.js, Stripe)..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-zinc-200 bg-zinc-50 text-sm placeholder-zinc-400 focus:bg-white transition-colors"
            >
        </div>
        <div class="w-full md:w-64 relative">
            <i class="fa-solid fa-location-dot absolute left-3.5 top-3.5 text-zinc-400 text-sm"></i>
            <input 
                type="text" 
                placeholder="City or Remote..." 
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-zinc-200 bg-zinc-50 text-sm placeholder-zinc-400 focus:bg-white transition-colors"
            >
        </div>
    </div>

    <!-- Quick Stats Bar -->
    <div class="mb-6 grid grid-cols-2 md:grid-cols-4 gap-4 bg-zinc-50 border border-zinc-200 rounded-xl p-3 text-xs text-zinc-500 font-medium">
        <div class="flex items-center gap-2 px-2">
            <i class="fa-solid fa-chart-line text-[#00B1AA]"></i>
            <span>Avg. response time: <strong>3 days</strong></span>
        </div>
        <div class="flex items-center gap-2 px-2">
            <i class="fa-solid fa-circle-check text-[#00B1AA]"></i>
            <span>Verified positions: <strong>100%</strong></span>
        </div>
        <div class="flex items-center gap-2 px-2">
            <i class="fa-solid fa-bolt text-[#00B1AA]"></i>
            <span>Trending Skills: <strong>Next.js, Rust</strong></span>
        </div>
        <div class="flex items-center gap-2 px-2">
            <i class="fa-solid fa-wallet text-[#00B1AA]"></i>
            <span>Average stipend: <strong>$52.40/hr</strong></span>
        </div>
    </div>

    <!-- Main Workspace Split Pane -->
    <div class="flex-grow flex gap-6 overflow-hidden min-h-0">
        
        <!-- Filter Panel (Left) -->
        <aside class="hidden lg:block w-64 shrink-0 bg-white border border-zinc-200 rounded-xl p-5 overflow-y-auto space-y-6">
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Category</h3>
                <div class="mt-3 space-y-2.5">
                    <label class="flex items-center gap-2.5 text-sm text-zinc-600 font-medium">
                        <input type="checkbox" value="Engineering" x-model="filters.types" class="rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA] h-4 w-4">
                        Engineering
                    </label>
                    <label class="flex items-center gap-2.5 text-sm text-zinc-600 font-medium">
                        <input type="checkbox" value="Design" x-model="filters.types" class="rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA] h-4 w-4">
                        Product Design
                    </label>
                </div>
            </div>

            <div class="border-t border-zinc-100 pt-6">
                <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Workplace</h3>
                <div class="mt-3 space-y-2.5">
                    <label class="flex items-center gap-2.5 text-sm text-zinc-600 font-medium">
                        <input type="checkbox" value="Remote" x-model="filters.locations" class="rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA] h-4 w-4">
                        Remote Only
                    </label>
                    <label class="flex items-center gap-2.5 text-sm text-zinc-600 font-medium">
                        <input type="checkbox" value="Hybrid" x-model="filters.locations" class="rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA] h-4 w-4">
                        Hybrid
                    </label>
                    <label class="flex items-center gap-2.5 text-sm text-zinc-600 font-medium">
                        <input type="checkbox" value="On-site" x-model="filters.locations" class="rounded border-zinc-300 text-[#00B1AA] focus:ring-[#00B1AA] h-4 w-4">
                        On-site
                    </label>
                </div>
            </div>

            <div class="border-t border-zinc-100 pt-6">
                <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Min Hourly Stipend</h3>
                <div class="mt-3">
                    <select x-model="filters.stipend" class="w-full text-sm bg-zinc-50 border border-zinc-200 rounded-lg p-2 font-medium">
                        <option value="">Any compensation</option>
                        <option value="35">$35.00/hr or more</option>
                        <option value="45">$45.00/hr or more</option>
                        <option value="55">$55.00/hr or more</option>
                    </select>
                </div>
            </div>

            <div class="border-t border-zinc-100 pt-6">
                <button 
                    @click="filters.types = []; filters.locations = []; filters.stipend = ''; searchQuery = '';" 
                    class="w-full text-xs text-zinc-500 hover:text-zinc-900 border border-zinc-200 rounded-lg py-2 hover:bg-zinc-50 font-medium transition-colors"
                >
                    Clear All Filters
                </button>
            </div>
        </aside>

        <!-- JobList (Middle) -->
        <section class="flex-grow overflow-y-auto space-y-4 pr-2">
            <div class="flex justify-between items-center text-xs text-zinc-500 mb-1">
                <span x-text="`${filteredJobs.length} active opportunities found`"></span>
                <span class="lg:hidden font-semibold"><i class="fa-solid fa-sliders mr-1"></i>Filters (scroll down)</span>
            </div>

            <template x-if="filteredJobs.length === 0">
                <div class="bg-white border border-zinc-200 rounded-xl p-12 text-center text-zinc-500 space-y-3">
                    <i class="fa-regular fa-folder-open text-3xl text-zinc-300"></i>
                    <p class="font-medium">No active internships fit these filters.</p>
                    <p class="text-xs">Try clearing constraints or searching generic terms like "React" or "Design".</p>
                </div>
            </template>

            <template x-for="job in filteredJobs" :key="job.id">
                <div 
                    @click="activeJobId = job.id"
                    :class="activeJobId === job.id ? 'border-zinc-900 bg-zinc-50' : 'border-zinc-200 hover:border-zinc-300 bg-white'"
                    class="cursor-pointer border-2 rounded-xl p-5 shadow-soft transition-all duration-150 relative"
                >
                    <!-- Stack Match Tag -->
                    <span 
                        :class="job.id === 1 ? 'bg-[#00B1AA]/5 text-[#00B1AA] ring-[#00B1AA]/10' : 'bg-zinc-100 text-zinc-600 ring-zinc-500/10'" 
                        class="absolute right-5 top-5 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold ring-1 ring-inset"
                    >
                        <i class="fa-solid fa-bolt mr-1 text-[10px]"></i>
                        <span x-text="`${job.matchScore} Match`"></span>
                    </span>

                    <div class="flex items-start gap-4">
                        <div 
                            :class="job.logoBg" 
                            class="h-12 w-12 rounded-lg flex items-center justify-center text-white font-bold text-lg"
                            x-text="job.logo"
                        ></div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-zinc-900 text-base" x-text="job.title"></h3>
                            <p class="text-zinc-600 text-sm font-medium" x-text="job.company"></p>
                            
                            <div class="flex flex-wrap gap-2 pt-2">
                                <span class="inline-flex items-center rounded bg-zinc-100 px-2 py-0.5 text-xs font-medium text-zinc-800" x-text="job.location"></span>
                                <span class="inline-flex items-center rounded bg-zinc-100 px-2 py-0.5 text-xs font-medium text-zinc-800" x-text="job.duration"></span>
                                <span class="inline-flex items-center rounded bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-900" x-text="job.stipend"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-zinc-400 flex items-center gap-1.5 font-medium">
                        <span x-text="`Posted ${job.posted}`"></span>
                        &middot;
                        <span x-text="`Apply by ${job.deadline}`"></span>
                    </div>
                </div>
            </template>

            <!-- Small Mobile Filter (displays inside the stream at the bottom) -->
            <div class="lg:hidden bg-white border border-zinc-200 rounded-xl p-5 mt-6 space-y-4">
                <h3 class="font-bold text-zinc-900 text-sm"><i class="fa-solid fa-sliders mr-2"></i>Filter Opportunities</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase">Category</h4>
                        <div class="mt-2 space-y-2">
                            <label class="flex items-center gap-2 text-xs font-medium">
                                <input type="checkbox" value="Engineering" x-model="filters.types" class="rounded border-zinc-300 text-[#00B1AA]">
                                Engineering
                            </label>
                            <label class="flex items-center gap-2 text-xs font-medium">
                                <input type="checkbox" value="Design" x-model="filters.types" class="rounded border-zinc-300 text-[#00B1AA]">
                                Design
                            </label>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-zinc-400 uppercase">Workplace</h4>
                        <div class="mt-2 space-y-2">
                            <label class="flex items-center gap-2 text-xs font-medium">
                                <input type="checkbox" value="Remote" x-model="filters.locations" class="rounded border-zinc-300 text-[#00B1AA]">
                                Remote Only
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Preview Card (Right, sticky in desktop viewport) -->
        <aside class="hidden md:block w-[450px] shrink-0 bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-soft flex flex-col sticky top-20">
            <!-- Header preview -->
            <div class="border-b border-zinc-100 p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div 
                        :class="activeJob.logoBg" 
                        class="h-14 w-14 rounded-xl flex items-center justify-center text-white font-extrabold text-2xl"
                        x-text="activeJob.logo"
                    ></div>
                    <div>
                        <h2 class="font-bold text-zinc-900 text-lg" x-text="activeJob.title"></h2>
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-semibold text-zinc-700" x-text="activeJob.company"></span>
                            <span class="text-zinc-300">&middot;</span>
                            <span class="text-zinc-500 font-medium" x-text="activeJob.location"></span>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button @click="applyModalOpen = true" class="flex-grow rounded-lg bg-zinc-900 px-4 py-2.5 text-center text-sm font-semibold text-white hover:bg-zinc-800 shadow-soft transition-colors">
                        Apply Now
                    </button>
                    <button class="px-3 py-2.5 rounded-lg border border-zinc-200 text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900">
                        <i class="fa-regular fa-bookmark"></i>
                    </button>
                </div>
            </div>

            <!-- Scrollable body content -->
            <div class="flex-grow overflow-y-auto p-6 space-y-6">
                <!-- Stack Match Rating -->
                <div class="bg-[#00B1AA]/5 border border-[#00B1AA]/10 rounded-lg p-4 flex gap-3.5 items-start">
                    <i class="fa-solid fa-bolt text-[#00B1AA] mt-0.5 text-sm"></i>
                    <div>
                        <h4 class="font-bold text-[#00B1AA] text-sm" x-text="`Why you match: ${activeJob.matchScore}`"></h4>
                        <p class="text-xs text-[#00B1AA] mt-1">Based on your educational record and technical projects. Stack alignment is high.</p>
                        <!-- Stack badge loops -->
                        <div class="flex flex-wrap gap-1.5 mt-2.5">
                            <template x-for="item in activeJob.stack" :key="item">
                                <span class="bg-white/80 border border-[#00B1AA]/20 text-[10px] font-semibold text-[#00B1AA] px-2 py-0.5 rounded" x-text="item"></span>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Position Summary</h3>
                    <p class="text-zinc-600 text-sm leading-relaxed mt-2" x-text="activeJob.description"></p>
                </div>

                <!-- Team -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">The Team</h3>
                    <p class="text-zinc-600 text-sm leading-relaxed mt-2" x-text="activeJob.team"></p>
                </div>

                <!-- Responsibilities -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Key Responsibilities</h3>
                    <ul class="list-disc pl-4 space-y-2 mt-2 text-zinc-600 text-sm leading-relaxed">
                        <template x-for="resp in activeJob.responsibilities" :key="resp">
                            <li x-text="resp"></li>
                        </template>
                    </ul>
                </div>

                <!-- Requirements -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Requirements & Qualifications</h3>
                    <ul class="list-disc pl-4 space-y-2 mt-2 text-zinc-600 text-sm leading-relaxed">
                        <template x-for="req in activeJob.requirements" :key="req">
                            <li x-text="req"></li>
                        </template>
                    </ul>
                </div>
            </div>
        </aside>

    </div>

    <!-- Interactive Apply Modal -->
    <div x-show="applyModalOpen" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
        <div 
            x-show="applyModalOpen" 
            x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" 
            class="fixed inset-0 bg-zinc-950/40 backdrop-blur-sm"
        ></div>

        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div 
                    x-show="applyModalOpen" 
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave="transition ease-in duration-200" 
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    @click.outside="applyModalOpen = false" 
                    class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-zinc-200"
                >
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center border-b border-zinc-100 pb-4 mb-4">
                            <h3 class="text-base font-bold text-zinc-900" id="modal-title">
                                Apply to <span x-text="activeJob.company"></span>
                            </h3>
                            <button @click="applyModalOpen = false" class="text-zinc-400 hover:text-zinc-500">
                                <i class="fa-solid fa-xmark text-lg"></i>
                            </button>
                        </div>
                        <div class="space-y-4">
                            <p class="text-xs text-zinc-500">Applying for: <strong x-text="activeJob.title" class="text-zinc-800"></strong></p>
                            
                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 uppercase tracking-wider">Full Name</label>
                                <input type="text" value="Alexander Wright" class="mt-1.5 block w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm text-zinc-900">
                            </div>
                            
                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 uppercase tracking-wider">Academic Record</label>
                                <div class="mt-1.5 bg-zinc-50 border border-zinc-200 rounded-lg p-2.5 flex items-center justify-between text-xs text-zinc-600">
                                    <span>Stanford University, CS Major, GPA 3.91</span>
                                    <span class="text-emerald-600 font-semibold flex items-center gap-1"><i class="fa-solid fa-circle-check"></i> Verified Transcript</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 uppercase tracking-wider">Select Verified Resume</label>
                                <select class="mt-1.5 block w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm">
                                    <option>Alexander_Wright_Resume_InterlinkBuild.pdf (Last edited 2d ago)</option>
                                    <option>Alexander_Wright_Resume_Academic.pdf</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-zinc-700 uppercase tracking-wider">Introductory Note (optional)</label>
                                <textarea rows="3" class="mt-1.5 block w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm placeholder-zinc-400" placeholder="Highlight relevant coursework or stack experience..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
                        <button @click="applyModalOpen = false; alert('Application submitted successfully via Interlink matching system.')" type="button" class="inline-flex w-full justify-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-semibold text-white hover:bg-zinc-800 shadow-soft sm:w-auto">
                            Submit Application
                        </button>
                        <button @click="applyModalOpen = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-zinc-700 shadow-soft ring-1 ring-inset ring-zinc-300 hover:bg-zinc-50 sm:mt-0 sm:w-auto">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


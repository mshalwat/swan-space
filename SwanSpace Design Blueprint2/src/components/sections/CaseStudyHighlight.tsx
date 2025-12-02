import { TrendingUp, Users, Clock, Star } from 'lucide-react';

export function CaseStudyHighlight() {
  const metrics = [
    { icon: TrendingUp, value: '150%', label: 'Increased Engagement' },
    { icon: Users, value: '5,000+', label: 'Active Users' },
    { icon: Clock, value: '60%', label: 'Time Saved' },
    { icon: Star, value: '4.9/5', label: 'User Rating' }
  ];

  return (
    <section className="py-20 bg-white">
      <div className="container-custom">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Left - Content */}
          <div>
            <div className="inline-block px-4 py-2 bg-[#F9FAFB] rounded-full border border-[#E2E8F0] mb-6">
              <span className="text-sm text-[#5FA8D3] font-medium">Featured Case Study</span>
            </div>
            
            <h2 className="mb-6">
              Swan Schule:{' '}
              <span className="bg-gradient-to-r from-[#5FA8D3] to-[#8EC5FC] bg-clip-text text-transparent">
                A Digital Success Story
              </span>
            </h2>

            <p className="text-lg text-[#475569] mb-8 leading-relaxed">
              We partnered with Swan Schule to transform their digital presence, creating a 
              comprehensive platform that connects students, parents, and educators seamlessly. 
              The results exceeded all expectations.
            </p>

            <div className="space-y-6 mb-8">
              <div className="border-l-4 border-[#5FA8D3] pl-6">
                <h4 className="mb-2">The Challenge</h4>
                <p className="text-[#475569]">
                  Swan Schule needed a modern platform to improve communication and streamline 
                  administrative processes across their growing institution.
                </p>
              </div>
              
              <div className="border-l-4 border-[#8EC5FC] pl-6">
                <h4 className="mb-2">The Solution</h4>
                <p className="text-[#475569]">
                  A custom-built website with integrated management tools, mobile-responsive 
                  design, and intuitive interfaces for all stakeholders.
                </p>
              </div>
            </div>

            <a
              href="#case-studies"
              className="inline-flex items-center gap-2 px-6 py-3 bg-[#5FA8D3] text-white rounded-full hover:bg-[#4A90BB] transition-all"
            >
              View Full Case Study
              <span>→</span>
            </a>
          </div>

          {/* Right - Metrics */}
          <div>
            <div className="bg-gradient-to-br from-[#F9FAFB] to-white rounded-3xl p-8 border border-[#E2E8F0] shadow-lg">
              <h3 className="mb-8 text-center">Key Results</h3>
              
              <div className="grid grid-cols-2 gap-6">
                {metrics.map((metric, index) => (
                  <div
                    key={index}
                    className="bg-white rounded-2xl p-6 text-center shadow-sm border border-[#E2E8F0] hover:shadow-md transition-shadow"
                  >
                    <div className="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#8EC5FC] to-[#E0C3FC] flex items-center justify-center">
                      <metric.icon className="text-white" size={24} />
                    </div>
                    <div className="text-2xl font-bold text-[#0F172A] mb-1">
                      {metric.value}
                    </div>
                    <div className="text-sm text-[#475569]">{metric.label}</div>
                  </div>
                ))}
              </div>

              {/* Before/After Preview */}
              <div className="mt-8 pt-8 border-t border-[#E2E8F0]">
                <div className="grid grid-cols-2 gap-4">
                  <div className="text-center">
                    <div className="text-sm text-[#475569] mb-2">Before</div>
                    <div className="h-32 rounded-xl bg-[#E2E8F0] flex items-center justify-center">
                      <span className="text-4xl opacity-50">📄</span>
                    </div>
                  </div>
                  <div className="text-center">
                    <div className="text-sm text-[#475569] mb-2">After</div>
                    <div className="h-32 rounded-xl bg-gradient-to-br from-[#8EC5FC]/20 to-[#E0C3FC]/20 flex items-center justify-center border-2 border-[#5FA8D3]">
                      <span className="text-4xl">✨</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
